<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Services\BaseService;
use Modules\Employees\Repositories\EmployeeRepository;

class EmployeeService extends BaseService implements EmployeeInterface {

    protected $employeeRepository;

    /**
     * EmployeeService constructor
     *
     * @param Request $request
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        Request $request,
        EmployeeRepository $employeeRepository)
    {
        $this->request = $request;
        $this->employeeRepository = $employeeRepository;

        parent::__construct($request);
    }

    /**
     *  Employee List Service
     */
    public function list()
    {
        return (new GetEmployeeList($this->request, $this->employeeRepository))->handle()->response;
    }

    /**
     *  Create Employee Service
     */
    public function create($request)
    {
        return (new CreateEmployee($request, $this->employeeRepository))->handle()->response;
    }

    /**
     *  Update Employee Service
     */
    public function update($id, $request)
    {
        return (new UpdateEmployee($id, $request, $this->employeeRepository))->handle()->response;
    }

    /**
     *  Delete Employee Service
     */
    public function delete($id, $request)
    {
        return (new DeleteEmployee($id, $request, $this->employeeRepository))->handle()->response;
    }

    /**
     *  Employee List All Service
     */
    public function all()
    {
        return (new GetAllEmployeeList($this->request, $this->employeeRepository))->handle()->response;
    }
}
