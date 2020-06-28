<?php

namespace Modules\Departments\Services;

use Illuminate\Http\Request;
use Modules\Departments\Repositories\DepartmentRepository;
use Ramsey\Uuid\Uuid;

class CreateDepartment extends AbstractDepartment
{
    protected $request;

    protected $repository;

    /**
     * CreateDepartment constructor
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
     * Create department handle
     *
     * @return AbstractDepartment
     */
    public function handle(): AbstractDepartment
    {

        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description'),
            'company_uuid' => $this->request->post('company_uuid')
        ];

        $create = $this->repository->create($data);

        if( !$create ){
            $this->response = $this->makeResponse(400, 'save.400');
            $this->response->department = null;
            return $this;
        }

        $this->response = $this->makeResponse(201, 'save.201');
        $this->response->department = $create;

        return $this;
    }
}
