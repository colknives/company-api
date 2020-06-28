<?php

namespace Modules\Employees\Services;

use Illuminate\Http\Request;
use Modules\Employees\Repositories\EmployeeRepository;
use Exception;

class DeleteEmployee extends AbstractEmployee
{
    protected $id;

    protected $request;

    protected $repository;

    /**
     * DeleteEmployee constructor
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
     * Delete employee handle
     *
     * @return AbstractEmployee
     * @throws Exception
     */
    public function handle(): AbstractEmployee
    {
        //Get employee list
        $employee = $this->repository->find('uuid', $this->id);

        if( !$employee ){
            $this->response = $this->makeResponse(404, 'delete.404');
            return $this;
        }

        $delete = $this->repository->delete($employee);

        if( !$delete ){
            $this->response = $this->makeResponse(400, 'delete.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'delete.200');
        return $this;
    }
}
