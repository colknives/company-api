<?php

namespace Modules\Departments\Services;

use Illuminate\Http\Request;
use Modules\Departments\Repositories\DepartmentRepository;

class GetAllDepartmentList extends AbstractDepartment
{
    protected $request;

    protected $repository;

    /**
     * GetDepartmentList constructor
     *
     * @param Request $request
     * @param DepartmentRepository $repository
     *
     */
    public function __construct(
        Request $request,
        DepartmentRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Get department list handle
     *
     * @return AbstractDepartment
     */
    public function handle(): AbstractDepartment
    {
        //Get department list
        $departments = $this->repository->all();

        $this->response = $this->makeResponse(200, 'list.200');
        $this->response->list = $departments;

        return $this;
    }
}
