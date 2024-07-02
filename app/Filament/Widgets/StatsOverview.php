<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    private static $totalMembers;

    private static $totalStudents;

    private static $totalInstiutions;

    private static $totalFunds;

    public function getTotalMembersCount()
    {
        if (static::$totalMembers !== null) {
            return static::$totalMembers;
        }

        return static::$totalMembers = Cache::remember('total.members.count', now()->addMinutes(30), function () {
            return User::query()->count();
        });
    }

    public function getTotalStudentsCount()
    {
        if (static::$totalStudents !== null) {
            return static::$totalStudents;
        }

        return static::$totalStudents = Cache::remember('total.students.count', now()->addMinutes(30), function () {
            return User::query()->whereHas('student')->count();
        });
    }

    public function getTotalInstiutionsCount()
    {
        if (static::$totalInstiutions !== null) {
            return static::$totalInstiutions;
        }

        return static::$totalInstiutions = Cache::remember('total.instiutions.count', now()->addMinutes(30), function () {
            //user has many schools
            return User::query()
                ->whereHas('schools')
                ->orWhereHas('educationalConsultant')
                ->orWhereHas('trainingProvider')
                ->count();
        });
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Members Population', $this->getTotalMembersCount())
                ->description('Total number of members on the platform')
                ->icon('heroicon-o-user-group')
                ->color('primary')
                ->chart([2, 25, 33, 18, 10, 12, 2, 52, 2, 20])
                ->chartColor('info'),
            Stat::make('Students Population', $this->getTotalStudentsCount())
                ->description('Total number of students on the platform')
                ->icon('heroicon-o-academic-cap')
                ->color('success')
                ->chart([2, 10, 15, 18, 10, 12, 2, 52, 2, 20])
                ->chartColor('success'),
            Stat::make('Institutions Population', $this->getTotalInstiutionsCount())
                ->description('Total number of institutions on the platform')
                ->icon('heroicon-o-building-office-2')
                ->color('warning')
                ->chart([2, 5, 3, 18, 10, 12, 2, 52, 2, 20])
                ->chartColor('warning'),
        ];
    }
}
