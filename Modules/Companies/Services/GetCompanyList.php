<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;

class GetCompanyList extends AbstractCompany
{
    protected $request;

    protected $repository;

    protected $perPage = 10;

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
     * Get company list handle
     *
     * @return AbstractCompany
     */
    public function handle(): AbstractCompany
    {
        //Get company list
        $companies = $this->repository->getList($this->perPage);

        $this->response = $this->makeResponse(200, 'list.200');
        $this->response->list = $companies;

        return $this;
    }
}
