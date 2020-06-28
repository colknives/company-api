<?php

namespace Modules\Employees\Services;

interface EmployeeInterface {

    public function list();

    public function create($request);

    public function update($id, $request);

    public function delete($id, $request);

    public function all();
}
