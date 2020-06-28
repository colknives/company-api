<?php

namespace Modules\Companies\Services;

interface CompanyInterface {

    public function list();

    public function create($request);

    public function update($id, $request);

    public function delete($id, $request);

    public function all();
}
