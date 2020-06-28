<?php

namespace Modules\Departments\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Departments\Services\DepartmentService;
use Modules\Departments\Collections\DepartmentCollection;
use Modules\Departments\Collections\Department as DepartmentResource;

class DepartmentController extends BaseController
{
    protected $departmentService;

    /**
     * Department controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Department list method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function list()
    {
        $list = $this->departmentService->list();

        //Prepare collection
        $collection = $this->prepareCollection(new DepartmentCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data'],
            'meta' => $collection['meta'],
        ], $list->status);
    }

    /**
     * Create department method instance
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_uuid' => 'required'
        ]);

        $create = $this->departmentService->create($request);

        //Prepare resource
        $details = ( $create->department )? new DepartmentResource($create->department) : null;
        $resource = $this->prepareResource($details);

        return response()->json([
            'message' => $create->message,
            'department' => $resource
        ], $create->status);
    }

    /**
     * Update department method instance
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'company_uuid' => 'required'
        ]);

        $update = $this->departmentService->update($id, $request);

        return response()->json([
            'message' => $update->message
        ], $update->status);
    }

    /**
     * Delete department method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function delete(Request $request, $id)
    {
        $delete = $this->departmentService->delete($id, $request);
        return response()->json([
            'message' => $delete->message
        ], $delete->status);
    }

    /**
     * Department all method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function all()
    {
        $list = $this->departmentService->all();

        //Prepare collection
        $collection = $this->prepareCollection(new DepartmentCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data']
        ], $list->status);
    }
}
