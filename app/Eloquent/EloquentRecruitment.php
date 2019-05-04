<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

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
}
