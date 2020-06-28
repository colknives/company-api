<?php

namespace Modules\Departments\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'Modules\Departments\Collections\Department';
}
