<?php

namespace Modules\Companies\Services;

use Modules\Companies\Services\BaseService;
use Illuminate\Http\Request;

abstract class AbstractCompany extends BaseService
{
    protected $module = 'companies';

    /**
     * AbstractCompany constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    abstract public function handle(): AbstractCompany;
}
