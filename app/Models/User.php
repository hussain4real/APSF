<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\MemberScope;
use App\Status;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

// #[ScopedBy([MemberScope::class])]
class User extends Authenticatable implements FilamentUser, HasAvatar, HasMedia, HasName, MustVerifyEmail
{
    use HasFactory, HasRoles, InteractsWithMedia, Notifiable;

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

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_url ? $this->profile_photo_url : null;
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
     * HasOne Member
     */
    public function member(): HasOne
    {
        return $this->hasOne(Member::class);
    }

    /**
     * HasMany Reviews
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function livefeeds(): HasMany
    {
        return $this->hasMany(Livefeed::class);
    }

    //    /**
    //     * Get all the user's reviews.
    //     */
    //    public function reviewees(): MorphMany
    //    {
    //        return $this->morphMany(Review::class, 'reviewable');
    //    }

    /**
     * Get the sum of all the user's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        //get the sum of rating for related models
        if ($this->teacher) {
            return $this->teacher->reviews->sum('rating');
        }

        if ($this->student) {
            return $this->student->reviews->sum('rating');
        }

        if ($this->schools) {
            return $this->schools->reviews->sum('rating');
        }

        if ($this->founder) {
            return $this->founder->reviews->sum('rating');
        }

        if ($this->trainingProvider) {
            return $this->trainingProvider->reviews->sum('rating');
        }

        if ($this->contractor) {
            return $this->contractor->reviews->sum('rating');
        }

        if ($this->educationalConsultant) {
            return $this->educationalConsultant->reviews->sum('rating');
        }

        if ($this->member) {
            return $this->member->reviews->sum('rating');
        }

        return 0;
    }

    /**
     * Get User Reviews
     */
    public function getReviewsAttribute(?int $schoolId)
    {
        //get the reviews for related models
        if ($this->teacher) {
            return $this->teacher->reviews()->get();
        }

        if ($this->student) {
            return $this->student->reviews()->get();
        }

        $school = $this->schools()->find($schoolId);

        if ($school) {
            return $school->reviews()->get();
        }

        if ($this->founder) {
            return $this->founder->reviews()->get();
        }

        if ($this->trainingProvider) {
            return $this->trainingProvider->reviews()->get();
        }

        if ($this->contractor) {
            return $this->contractor->reviews()->get();
        }

        if ($this->educationalConsultant) {
            return $this->educationalConsultant->reviews()->get();
        }

        if ($this->member) {
            return $this->member->reviews()->get();
        }

        return collect();
    }

    /**
     * Get the average rating of the user.
     */
    public function getRatingAttribute(?int $schoolId): float
    {
        //get the average rating for related models
        if ($this->teacher) {
            return $this->teacher->reviews->avg('rating') ?? 0;
        }

        if ($this->student) {
            return $this->student->reviews->avg('rating') ?? 0;
        }

        $school = $this->schools()->find($schoolId);

        if ($school) {
            return $school->reviews->avg('rating') ?? 0;
        }

        if ($this->founder) {
            return $this->founder->reviews->avg('rating') ?? 0;
        }

        if ($this->trainingProvider) {
            return $this->trainingProvider->reviews->avg('rating') ?? 0;
        }

        if ($this->contractor) {
            return $this->contractor->reviews->avg('rating') ?? 0;
        }

        if ($this->educationalConsultant) {
            return $this->educationalConsultant->reviews->avg('rating') ?? 0;
        }

        if ($this->member) {
            return $this->member->reviews->avg('rating') ?? 0;
        }

        return 0;
    }

    //spatie media library
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Fit::Contain, 300,300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo');
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->getFirstMediaUrl('profile_photo')) {
            return $this->getFirstMediaUrl('profile_photo');
        }
        //grab grab the users avatar from the avatar column of the users table
        //        if ($this->avatar) {
        //            return $this->avatar;
        //        }

        return 'https://ui-avatars.com/api/?name=' . $this->name . '&color=#ff8503&background=ffd22b';
    }

    //    /**
    //     * get the user's full name
    //     */
    //    public function lemonSqueezyName(): ?string
    //    {
    //        return $this->name;
    //    }

    /**
     * get the user's profile type
     */
    public function getProfileTypeAttribute(): ?string
    {
        if ($this->teacher) {
            return 'Teacher';
        }

        if ($this->student) {
            return 'Student';
        }

        //schools is hasMany relationship
        if ($this->schools()->count() > 0) {
            return 'School';
        }

        if ($this->founder) {
            return 'Founder';
        }

        if ($this->trainingProvider) {
            return 'Training Provider';
        }

        if ($this->contractor) {
            return 'Contractor';
        }

        if ($this->educationalConsultant) {
            return 'Educational Consultant';
        }

        if ($this->member) {
            return 'Member';
        }

        return 'User';
    }

    /**
     * get the user's profile type
     */
    public function getProfileTypeForMembershipAttribute(): ?string
    {
        if ($this->teacher) {
            //return based on the language
            if (app()->getLocale() === 'ar') {

                return 'الهيئة التعليمية';
            }

            return 'Educational Staff';
        }

        if ($this->student) {
            if (app()->getLocale() === 'ar') {
                return 'الطلبة';
            }

            return 'Students';
        }

        //schools is hasMany relationship
        if ($this->schools()->count() > 0) {
            if (app()->getLocale() === 'ar') {
                return 'المدارس';
            }

            return 'Schools';
        }

        if ($this->founder) {
            return 'Founder';
        }

        if ($this->trainingProvider) {
            if (app()->getLocale() === 'ar') {
                return 'مقدم خدمة';
            }

            return 'Service Provider';
        }

        if ($this->contractor) {
            if (app()->getLocale() === 'ar') {
                return 'الموردون';
            }

            return 'Contractors';
        }

        if ($this->educationalConsultant) {
            if (app()->getLocale() === 'ar') {
                return 'مقدم خدمة';
            }

            return 'Service Provider';
        }

        if ($this->member) {
            if (app()->getLocale() === 'ar') {
                return 'عضو';
            }

            return 'Member';
        }

        return 'User';
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->hasRole('super_admin');
    }

    //
    //    /**
    //     * get the user's country
    //     */
    //    public function lemonSqueezyCountry(): ?string
    //    {
    //        $arabCountries = [
    //            'Algeria' => 'DZ',
    //            'Bahrain' => 'BH',
    //            'Comoros' => 'KM',
    //            'Djibouti' => 'DJ',
    //            'Egypt' => 'EG',
    //            'Iraq' => 'IQ',
    //            'Jordan' => 'JO',
    //            'Kuwait' => 'KW',
    //            'Lebanon' => 'LB',
    //            'Libya' => 'LY',
    //            'Mauritania' => 'MR',
    //            'Morocco' => 'MA',
    //            'Oman' => 'OM',
    //            'Palestine' => 'PS',
    //            'Qatar' => 'QA',
    //            'Saudi Arabia' => 'SA',
    //            'Somalia' => 'SO',
    //            'Sudan' => 'SD',
    //            'Syria' => 'SY',
    //            'Tunisia' => 'TN',
    //            'United Arab Emirates' => 'AE',
    //            'Yemen' => 'YE',
    //            // Add more countries as needed...
    //        ];
    //
    //        //        dd($this->student);
    //        $userCountry = match (true) {
    //            $this->student !== null => $this->student->country,
    //            $this->teacher !== null => $this->teacher->country,
    //            $this->founder !== null => $this->founder->school_country,
    //            $this->trainingProvider !== null => $this->trainingProvider->country,
    //            $this->contractor !== null => $this->contractor->country,
    //            $this->educationalConsultant !== null => $this->educationalConsultant->country,
    //            $this->member !== null => $this->member->country,
    //            $this->schools()->count() > 0 => $this->schools->first()->country,
    //            default => 'Qatar',
    //        };
    //
    //        if ($userCountry) {
    //            return $arabCountries[$userCountry] ?? null;
    //        }
    //
    //        return null;
    //    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function paymentPlans(): HasMany
    {
        return $this->hasMany(PaymentPlan::class);
    }

    public function trainingPrograms(): BelongsToMany
    {
        return $this->belongsToMany(TrainingProgram::class, 'training_program_users')
            ->using(TrainingProgramUser::class)
            ->withPivot('status', 'enrolled_at')
            ->withTimestamps();
    }

    public function subscribed(): bool
    {
        return $this->subscription()->exists();
    }

    public function hasActiveSubscription(): bool
    {
        return $this->subscription?->ends_at?->isFuture() ?? false;
    }

    public function subscriptionExpired(): bool
    {
        return $this->subscription->ends_at->isPast();
    }

    public function onTrial(): bool
    {
        return $this->subscription?->where('trial_ends_at', '>', now())->exists() ?? false;
    }

    public function trialEndsAt()
    {
        return $this->subscription?->trial_ends_at ?? null;
    }
}
