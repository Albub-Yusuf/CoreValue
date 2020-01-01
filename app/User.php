<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model implements
    \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use SoftDeletes;

    protected  $fillable = [

        'name',
        'email',
        'password',
        'phone',
        'status',
        'file'

    ];
}
