<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Customer;
use LogicException;

class User extends Authenticatable implements FilamentUser, HasAvatar, HasName, MustVerifyEmail
{
    use Billable, HasFactory, Notifiable;

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
}
