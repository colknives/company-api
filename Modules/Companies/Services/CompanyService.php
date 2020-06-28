<?php

namespace Modules\Companies\Services;

use Illuminate\Http\Request;
use Modules\Companies\Services\BaseService;
use Modules\Companies\Repositories\CompanyRepository;

class CompanyService extends BaseService implements CompanyInterface {

    protected $companyRepository;

    /**
     * CompanyService constructor
     *
     * @param Request $request
     * @param CompanyRepository $companyRepository
     */
    public function __construct(
        Request $request,
        CompanyRepository $companyRepository)
    {
        $this->request = $request;
        $this->companyRepository = $companyRepository;

        parent::__construct($request);
    }

    /**
     *  Company List Service
     */
    public function list()
    {
        return (new GetCompanyList($this->request, $this->companyRepository))->handle()->response;
    }

    /**
     *  Create Company Service
     */
    public function create($request)
    {
        return (new CreateCompany($request, $this->companyRepository))->handle()->response;
    }

    /**
     *  Update Company Service
     */
    public function update($id, $request)
    {
        return (new UpdateCompany($id, $request, $this->companyRepository))->handle()->response;
    }

    /**
     *  Delete Company Service
     */
    public function delete($id, $request)
    {
        return (new DeleteCompany($id, $request, $this->companyRepository))->handle()->response;
    }

    /**
     *  Company List All Service
     */
    public function all()
    {
        return (new GetAllCompanyList($this->request, $this->companyRepository))->handle()->response;
    }
}
