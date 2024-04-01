<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\MemberScope;
use App\Status;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Customer;
use LogicException;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

// #[ScopedBy([MemberScope::class])]
class User extends Authenticatable implements FilamentUser, HasAvatar, HasMedia, HasName
{
    use Billable, HasFactory, InteractsWithMedia, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'city',
        'state',
        'country',
        'status',
        'rating',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => Status::class,
        ];
    }

    /**
     * Get the billable model's name to associate with Paddle.
     */
    public function paddleName(): ?string
    {
        return $this->name;
    }

    /**
     * Create a Paddle customer for the given model.
     *
     * @return \Laravel\Paddle\Customer
     */
    public function createAsCustomer(array $options = [])
    {
        if ($customer = $this->customer) {
            return $customer;
        }

        if (! array_key_exists('name', $options) && $name = $this->paddleName()) {
            $options['name'] = $this->paddleName();
        }

        if (! array_key_exists('email', $options) && $email = $this->paddleEmail()) {
            $options['email'] = $email;
        }

        if (! isset($options['email'])) {
            throw new LogicException('Unable to create Paddle customer without an email.');
        }

        $trialEndsAt = $options['trial_ends_at'] ?? null;

        unset($options['trial_ends_at']);

        // Attempt to find the customer by email address first...
        $response = Cashier::api('GET', 'customers', [
            'status' => 'active,archived',
            'search' => $options['email'],
        ])['data'][0] ?? null;

        // If we can't find the customer by email, we'll create them on Paddle...
        if (is_null($response)) {
            $response = Cashier::api('POST', 'customers', $options)['data'];
        }

        if (Cashier::$customerModel::where('paddle_id', $response['id'])->exists()) {
            throw new LogicException("The Paddle customer [{$response['id']}] already exists in the database.");
        }

        $customer = $this->customer()->make();
        $customer->paddle_id = $response['id'];
        $customer->name = $response['name'];
        $customer->email = $response['email'];
        $customer->trial_ends_at = $trialEndsAt;
        $customer->save();

        $this->refresh();

        return $customer;
    }

    public function getPayLinkForProductPriceId($priceId)
    {
        return $this->checkout([$priceId]);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * HasMany School
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

    /**
     * HasOne Teacher
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    /**
     * HasOne Student
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    /**
     * HasOne Founder
     */
    public function founder(): HasOne
    {
        return $this->hasOne(Founder::class);
    }

    /**
     * HasOne TrainingProvider
     */
    public function trainingProvider(): HasOne
    {
        return $this->hasOne(TrainingProvider::class);
    }

    /**
     * HasOne Contractor
     */
    public function contractor(): HasOne
    {
        return $this->hasOne(Contractor::class);
    }

    /**
     * HasOne EducationalConsultant
     */
    public function educationalConsultant(): HasOne
    {
        return $this->hasOne(EducationalConsultant::class);
    }

    /**
     * HasMany Reviews
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get all the user's reviews.
     */
    public function reviewees(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get the sum of all the user's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        return $this->reviewees->sum('rating');
    }

    /**
     * Get User Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviewees()->get();
    }

    /**
     * Get the average rating of the user.
     */
    public function getRatingAttribute(): float
    {
        return $this->reviewees->avg('rating');
        //        if ($this->reviewees->count() > 0) {
        //            return floatval(number_format($this->rating_sum / $this->reviewees->count(), 2));
        //        }
        //
        //        return 0.0;
    }

    //spatie media library
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(fit: Fit::Contain)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
            ->singleFile();
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->getFirstMediaUrl('profile_photos')) {
            return $this->getFirstMediaUrl('profile_photos');
        }

        return 'https://ui-avatars.com/api/?name='.$this->name.'&color=#ff8503&background=ffd22b';
    }
}
