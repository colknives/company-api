<?php

namespace Modules\Departments\Repositories;

use Modules\Departments\Entities\Department as Model;

class DepartmentRepository extends BaseRepository {

    /**
     * DepartmentRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
