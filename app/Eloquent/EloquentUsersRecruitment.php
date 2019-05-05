<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentUsersRecruitment extends Model
{
    protected $table = 'users_recruitment';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id');
    }
}
