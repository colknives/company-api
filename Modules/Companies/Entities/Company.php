<?php

namespace Modules\Companies\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'uuid',
        'name',
        'description'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
