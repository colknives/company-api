<?php

namespace Modules\Employees\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'Modules\Employees\Collections\Employee';
}
