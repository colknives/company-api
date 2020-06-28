<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;
use Ramsey\Uuid\Uuid;

class CreateCompany extends AbstractCompany
{
    protected $request;

    protected $repository;

    /**
     * CreateCompany constructor
     *
     * @param Request $request
     * @param CompanyRepository $repository
     *
     */
    public function __construct(
        Request $request,
        CompanyRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Create company handle
     *
     * @return AbstractCompany
     */
    public function handle(): AbstractCompany
    {

        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description')
        ];

        $create = $this->repository->create($data);

        if( !$create ){
            $this->response = $this->makeResponse(400, 'save.400');
            $this->response->company = null;
            return $this;
        }

        $this->response = $this->makeResponse(201, 'save.201');
        $this->response->company = $create;

        return $this;
    }
}
