<?php

namespace Modules\Companies\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'Modules\Companies\Collections\Company';
}
