<?php

namespace Modules\Departments\Services;

use Illuminate\Http\Request;
use Modules\Departments\Repositories\DepartmentRepository;

class UpdateDepartment extends AbstractDepartment
{
    protected $request;

    protected $repository;

    protected $id;

    /**
     * UpdateDepartment constructor
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
     * Update department handle
     *
     * @return AbstractDepartment
     */
    public function handle(): AbstractDepartment
    {
        //Get department list
        $department = $this->repository->find('uuid', $this->id);

        if( !$department ){
            $this->response = $this->makeResponse(404, 'update.404');
            return $this;
        }

        $data = [
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description'),
            'company_uuid' => $this->request->post('company_uuid')
        ];

        $update = $this->repository->update($department, $data);

        if( !$update ){
            $this->response = $this->makeResponse(400, 'update.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'update.200');
        return $this;
    }
}
