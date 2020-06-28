<?php

namespace Modules\Companies\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Companies\Services\CompanyService;
use Modules\Companies\Collections\CompanyCollection;
use Modules\Companies\Collections\Company as CompanyResource;

class CompanyController extends BaseController
{
    protected $companyService;

    /**
     * Company controller instance.
     *
     * @return void
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Company list method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function list()
    {
        $list = $this->companyService->list();

        //Prepare collection
        $collection = $this->prepareCollection(new CompanyCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data'],
            'meta' => $collection['meta'],
        ], $list->status);
    }

    /**
     * Create company method instance
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $create = $this->companyService->create($request);

        //Prepare resource
        $details = ( $create->company )? new CompanyResource($create->company) : null;
        $resource = $this->prepareResource($details);

        return response()->json([
            'message' => $create->message,
            'company' => $resource
        ], $create->status);
    }

    /**
     * Update company method instance
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $update = $this->companyService->update($id, $request);

        return response()->json([
            'message' => $update->message
        ], $update->status);
    }

    /**
     * Delete company method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function delete(Request $request, $id)
    {
        $delete = $this->companyService->delete($id, $request);
        return response()->json([
            'message' => $delete->message
        ], $delete->status);
    }

    /**
     * Company all method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function all()
    {
        $list = $this->companyService->all();

        //Prepare collection
        $collection = $this->prepareCollection(new CompanyCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data']
        ], $list->status);
    }
}
