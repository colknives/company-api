<?php

namespace Modules\Departments\Services;

use Illuminate\Http\Request;
use Modules\Departments\Services\BaseService;
use Modules\Departments\Repositories\DepartmentRepository;

class DepartmentService extends BaseService implements DepartmentInterface {

    protected $departmentRepository;

    /**
     * DepartmentService constructor
     *
     * @param Request $request
     * @param DepartmentRepository $departmentRepository
     */
    public function __construct(
        Request $request,
        DepartmentRepository $departmentRepository)
    {
        $this->request = $request;
        $this->departmentRepository = $departmentRepository;

        parent::__construct($request);
    }

    /**
     *  Department List Service
     */
    public function list()
    {
        return (new GetDepartmentList($this->request, $this->departmentRepository))->handle()->response;
    }

    /**
     *  Create Department Service
     */
    public function create($request)
    {
        return (new CreateDepartment($request, $this->departmentRepository))->handle()->response;
    }

    /**
     *  Update Department Service
     */
    public function update($id, $request)
    {
        return (new UpdateDepartment($id, $request, $this->departmentRepository))->handle()->response;
    }

    /**
     *  Delete Department Service
     */
    public function delete($id, $request)
    {
        return (new DeleteDepartment($id, $request, $this->departmentRepository))->handle()->response;
    }

    /**
     *  Department All List Service
     */
    public function all()
    {
        return (new GetAllDepartmentList($this->request, $this->departmentRepository))->handle()->response;
    }
}
