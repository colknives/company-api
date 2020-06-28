<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;

class GetAllCompanyList extends AbstractCompany
{
    protected $request;

    protected $repository;

    /**
     * GetCompanyList constructor
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
     * Get all company list handle
     *
     * @return AbstractCompany
     */
    public function handle(): AbstractCompany
    {
        //Get all company list
        $companies = $this->repository->all();

        $this->response = $this->makeResponse(200, 'list.200');
        $this->response->list = $companies;

        return $this;
    }
}
