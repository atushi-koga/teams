<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use packages\Domain\Domain\Recruitment\Recruitment;

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
}
