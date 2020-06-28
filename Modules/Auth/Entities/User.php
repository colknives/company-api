<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Set Password Attribute
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
