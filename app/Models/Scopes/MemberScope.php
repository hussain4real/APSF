<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MemberScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //return model that does not have any of the following relationship(contractor,schools,student,teacher,founder,educationalConsultant,trainingProvider)

        $builder->whereDoesntHave('contractor')
            ->whereDoesntHave('schools')
            ->whereDoesntHave('student')
            ->whereDoesntHave('teacher')
            ->whereDoesntHave('founder')
            ->whereDoesntHave('educationalConsultant')
            ->whereDoesntHave('trainingProvider');

    }
}
