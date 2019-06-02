<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends BaseModel
{
    //use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'userId';
    //protected $guard_name = 'user';

    const CREATED_AT = 'createTime';
    const UPDATED_AT = 'updateTime';

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
