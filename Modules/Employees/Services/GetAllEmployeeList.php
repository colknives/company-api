<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Repositories\EmployeeRepository;

class GetAllEmployeeList extends AbstractEmployee
{
    protected $request;

    protected $repository;

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
     * Get all employee list handle
     *
     * @return AbstractEmployee
     */
    public function handle(): AbstractEmployee
    {
        //Get all employee list
        $companies = $this->repository->all();

        $this->response = $this->makeResponse(200, 'list.200');
        $this->response->list = $companies;

        return $this;
    }
}
