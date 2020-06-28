<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Repositories\EmployeeRepository;

class GetEmployeeList extends AbstractEmployee
{
    protected $request;

    protected $repository;

    protected $perPage = 10;

    /**
     * GetEmployeeList constructor
     *
     * @param Request $request
     * @param EmployeeRepository $repository
     *
     */
    public function __construct(
        Request $request,
        EmployeeRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Get employee list handle
     *
     * @return AbstractEmployee
     */
    public function handle(): AbstractEmployee
    {
        //Get employee list
        $employees = $this->repository->getList($this->perPage);

        $this->response = $this->makeResponse(200, 'list.200');
        $this->response->list = $employees;

        return $this;
    }
}
