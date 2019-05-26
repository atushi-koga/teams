<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use packages\Domain\Domain\User\UserStatus;

class EloquentUsersRecruitment extends Model
{
    protected $table = 'users_recruitment';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id');
    }

    public function scopeEntryUser($query)
    {
        return $query->where('user_status', '<>', UserStatus::ADMIN_STATUS);
    }
}
