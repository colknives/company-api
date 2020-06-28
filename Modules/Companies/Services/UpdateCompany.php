<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;

class UpdateCompany extends AbstractCompany
{
    protected $request;

    protected $repository;

    protected $id;

    /**
     * UpdateCompany constructor
     *
     * @param $id
     * @param Request $request
     * @param CompanyRepository $repository
     */
    public function __construct(
        $id,
        Request $request,
        CompanyRepository $repository)
    {
        $this->id = $id;
        $this->request = $request;
        $this->repository = $repository;

        parent::__construct($request);
    }

    /**
     * Update company handle
     *
     * @return AbstractCompany
     */
    public function handle(): AbstractCompany
    {
        //Get company list
        $company = $this->repository->find('uuid', $this->id);

        if( !$company ){
            $this->response = $this->makeResponse(404, 'update.404');
            return $this;
        }

        $data = [
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description')
        ];

        $update = $this->repository->update($company, $data);

        if( !$update ){
            $this->response = $this->makeResponse(400, 'update.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'update.200');
        return $this;
    }
}
