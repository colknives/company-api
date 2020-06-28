<?php

namespace Modules\Employees\Services;

use Modules\Employees\Services\BaseService;
use Illuminate\Http\Request;

abstract class AbstractEmployee extends BaseService
{
    protected $module = 'employees';

    /**
     * AbstractEmployee constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    abstract public function handle(): AbstractEmployee;
}
