<?php

namespace Modules\Employees\Repositories;

use Modules\Employees\Entities\Employee as Model;

class EmployeeRepository extends BaseRepository {

    /**
     * EmployeeRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
