<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\Domain\Domain\User\UserStatus;

class EloquentRecruitment extends Model
{
    protected $table = 'recruitment';

    protected $guarded = [];

    protected $dates = [
        'date',
        'deadline',
        'created_at',
        'updated_at'
    ];

    public function toModel(): Recruitment
    {
        return Recruitment::ofByArray($this->attributesToArray());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersRecruitment()
    {
        return $this->hasMany(EloquentUsersRecruitment::class, 'recruitment_id', 'id');
    }

    public function createUser()
    {
        return $this->belongsTo(EloquentUser::class, 'create_id', 'id');
    }

    public function scopeWhereGenderAndAgeLimit($query, BrowsingRestriction $criteria)
    {
        return $query->where(function ($q/** @var \Illuminate\Database\Eloquent\Builder $q */) use ($criteria) {
            $q->whereNull('gender_limit')
                ->orWhere('gender_limit', $criteria->gender->getKey());
        })
            ->where(function ($q2/** @var \Illuminate\Database\Eloquent\Builder $q2 */) use ($criteria) {
                $q2->where(function ($qq1/** @var \Illuminate\Database\Eloquent\Builder $qq1 */) use ($criteria) {
                    $qq1->whereNull('minimum_age')
                        ->orWhereRaw('? >= minimum_age', [$criteria->age->getValue()]);
                });
                $q2->where(function ($qq2/** @var \Illuminate\Database\Eloquent\Builder $qq2 */) use ($criteria) {
                    $qq2->whereNull('upper_age')
                        ->orWhereRaw('? <= upper_age', [$criteria->age->getValue()]);
                });
            });
    }
}
