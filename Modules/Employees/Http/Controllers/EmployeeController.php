<?php

namespace Modules\Employees\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Employees\Services\EmployeeService;
use Modules\Employees\Collections\EmployeeCollection;
use Modules\Employees\Collections\Employee as EmployeeResource;

class EmployeeController extends BaseController
{
    protected $employeeService;

    /**
     * Employee controller instance.
     *
     * @return void
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Employee list method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function list()
    {
        $list = $this->employeeService->list();

        //Prepare collection
        $collection = $this->prepareCollection(new EmployeeCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data'],
            'meta' => $collection['meta'],
        ], $list->status);
    }

    /**
     * Create employee method instance
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'department_uuid' => 'required'
        ]);

        $create = $this->employeeService->create($request);

        //Prepare resource
        $details = ( $create->employee )? new EmployeeResource($create->employee) : null;
        $resource = $this->prepareResource($details);

        return response()->json([
            'message' => $create->message,
            'employee' => $resource
        ], $create->status);
    }

    /**
     * Update employee method instance
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'department_uuid' => 'required'
        ]);

        $update = $this->employeeService->update($id, $request);

        return response()->json([
            'message' => $update->message
        ], $update->status);
    }

    /**
     * Delete employee method instance
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function delete(Request $request, $id)
    {
        $delete = $this->employeeService->delete($id, $request);
        return response()->json([
            'message' => $delete->message
        ], $delete->status);
    }

    /**
     * Employee all method instance
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function all()
    {
        $list = $this->employeeService->all();

        //Prepare collection
        $collection = $this->prepareCollection(new EmployeeCollection($list->list));

        return response()->json([
            'message' => $list->message,
            'data' => $collection['data']
        ], $list->status);
    }
}
