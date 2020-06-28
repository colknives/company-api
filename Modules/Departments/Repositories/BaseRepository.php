<?php

namespace Modules\Departments\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository {

    protected $model;

    /**
     * BaseRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model) {
        $this->model = $model;
    }

    /**
     * Get model instance
     *
     * @return Model
     */
    public function instance(): Model {
        return $this->model;
    }

    /**
     * Get model list
     *
     * @return Model
     */
    public function all() {
        return $this->model->get();
    }

    /**
     * Get paginate list
     *
     * @param $perPage
     * @return Model
     */
    public function getList($perPage)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Find model
     *
     * @param $field
     * @param $value
     * @return Model
     */
    public function find($field, $value) {
        return $this->model->where($field, $value)->first();
    }

    /**
     * Create model
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * Update model
     *
     * @param Model $context
     * @param array $data
     * @return bool
     */
    public function update(Model $context, array $data) {
        return $context->update($data);
    }

    /**
     * Delete model
     *
     * @param Model $context
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $context) {
        return $context->delete();
    }
}
