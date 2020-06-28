<?php

namespace Modules\Departments\Services;

interface DepartmentInterface {

    public function list();

    public function create($request);

    public function update($id, $request);

    public function delete($id, $request);

    public function all();
}
