<?php

namespace Modules\Employees\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'uuid',
        'firstname', 
        'lastname', 
        'email', 
        'department_uuid'
    ];

    protected $hidden = [
        'id',
        'password',
        'created_at',
        'updated_at'
    ];
}
