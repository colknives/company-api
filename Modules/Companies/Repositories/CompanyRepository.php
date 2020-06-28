<?php

namespace Modules\Companies\Repositories;

use Modules\Companies\Entities\Company as Model;

class CompanyRepository extends BaseRepository {

    /**
     * CompanyRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
