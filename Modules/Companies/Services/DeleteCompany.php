<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;
use Exception;

class DeleteCompany extends AbstractCompany
{
    protected $id;

    protected $request;

    protected $repository;

    /**
     * DeleteCompany constructor
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
     * Delete company handle
     *
     * @return AbstractCompany
     * @throws Exception
     */
    public function handle(): AbstractCompany
    {
        //Get company list
        $company = $this->repository->find('uuid', $this->id);

        if( !$company ){
            $this->response = $this->makeResponse(404, 'delete.404');
            return $this;
        }

        $delete = $this->repository->delete($company);

        if( !$delete ){
            $this->response = $this->makeResponse(400, 'delete.400');
            return $this;
        }

        $this->response = $this->makeResponse(200, 'delete.200');
        return $this;
    }
}
