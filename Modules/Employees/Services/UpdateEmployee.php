<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Repositories\EmployeeRepository;

class UpdateEmployee extends AbstractEmployee
{
    protected $request;

    protected $repository;

    protected $id;

    /**
     * UpdateEmployee constructor
     *
     * @param $id
     * @param Request $request
     * @param EmployeeRepository $repository
     */
    public function __construct(
        $id,
        Request $request,
        EmployeeRepository $repository)
    {
        $this->id = $id;
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Update employee handle
     *
     * @return AbstractEmployee
     */
    public function handle(): AbstractEmployee
    {
        //Get employee list
        $employee = $this->repository->find('uuid', $this->id);

        if( !$employee ){
            $this->response = $this->makeResponse(404, 'update.404');
            return $this;
        }

        $data = [
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description'),
            'department_uuid' => $this->request->post('department_uuid')
        ];

        $update = $this->repository->update($employee, $data);

        if( !$update ){
            $this->response = $this->makeResponse(400, 'update.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'update.200');
        return $this;
    }
}
