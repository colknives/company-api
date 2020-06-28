<?php

namespace Modules\Departments\Services;

use Illuminate\Http\Request;
use Modules\Departments\Repositories\DepartmentRepository;
use Exception;

class DeleteDepartment extends AbstractDepartment
{
    protected $id;

    protected $request;

    protected $repository;

    /**
     * DeleteDepartment constructor
     *
     * @param $id
     * @param Request $request
     * @param DepartmentRepository $repository
     */
    public function __construct(
        $id,
        Request $request,
        DepartmentRepository $repository)
    {
        $this->id = $id;
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Delete department handle
     *
     * @return AbstractDepartment
     * @throws Exception
     */
    public function handle(): AbstractDepartment
    {
        //Get department list
        $department = $this->repository->find('uuid', $this->id);

        if( !$department ){
            $this->response = $this->makeResponse(404, 'delete.404');
            return $this;
        }

        $delete = $this->repository->delete($department);

        if( !$delete ){
            $this->response = $this->makeResponse(400, 'delete.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'delete.200');
        return $this;
    }
}
