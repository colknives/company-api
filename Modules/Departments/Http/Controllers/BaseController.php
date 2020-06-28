<?php

namespace Modules\Departments\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller{

    public function prepareCollection($resource)
    {
        //Convert collection / resource to array
        $resourceCollection = $resource->toResponse(app('request'));
        return $resourceCollection->getData(true);
    }

    public function prepareResource($resource)
    {
        if( !$resource ){
            return null;
        }

        //Convert collection / resource to array
        $resourceCollection = $resource->toResponse(app('request'));
        $array = $resourceCollection->getData(true);
        return $array['data'];
    }

}
