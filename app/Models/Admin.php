<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'photo', 'password', 'created_at', 'updated_at',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
