<?php

namespace Modules\Departments\Services;

use Modules\Departments\Services\BaseService;
use Illuminate\Http\Request;

abstract class AbstractDepartment extends BaseService
{
    protected $module = 'departments';

    /**
     * AbstractDepartment constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    abstract public function handle(): AbstractDepartment;
}
