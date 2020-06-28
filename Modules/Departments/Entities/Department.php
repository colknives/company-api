<?php

namespace Modules\Departments\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'uuid',
        'company_uuid',
        'name',
        'description'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
