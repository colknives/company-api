<?php

namespace Modules\Auth\Repositories;

use Modules\Auth\Entities\User as Model;

class UserRepository extends BaseRepository {

    /**
     * UserRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
