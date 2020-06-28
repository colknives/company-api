<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Repositories\EmployeeRepository;
use Ramsey\Uuid\Uuid;

class CreateEmployee extends AbstractEmployee
{
    protected $request;

    protected $repository;

    /**
     * CreateEmployee constructor
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
     * Create employee handle
     *
     * @return AbstractEmployee
     */
    public function handle(): AbstractEmployee
    {

        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'firstname' => $this->request->post('firstname'),
            'lastname' => $this->request->post('lastname'),
            'email' => $this->request->post('email'),
            'department_uuid' => $this->request->post('department_uuid')
        ];

        $create = $this->repository->create($data);

        if( !$create ){
            $this->response = $this->makeResponse(400, 'save.400');
            $this->response->employee = null;
            return $this;
        }

        $this->response = $this->makeResponse(201, 'save.201');
        $this->response->employee = $create;

        return $this;
    }
}
