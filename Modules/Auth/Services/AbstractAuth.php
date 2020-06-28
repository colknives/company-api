<?php

namespace Modules\Auth\Services;

use Modules\Auth\Services\BaseService;
use Illuminate\Http\Request;

abstract class AbstractAuth extends BaseService
{
    protected $module = 'auth';

    /**
     * AbstractAuth constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    abstract public function handle(): AbstractAuth;
}
