<?php

namespace Modules\Departments\Tests\Feature;

use Tests\TestCase;
use Modules\Departments\Entities\Department;

class DepartmentTest extends TestCase
{
    /**
     * Get department list
     *
     * @return void
     */
    public function testDepartmentList()
    {
        $department = factory(Department::class, 5)->create();

        //401
        $response = $this->get('api/department/list');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/department/list', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data',
            'meta'
        ]);
    }

    /**
     * Create department
     *
     * @return void
     */
    public function testDepartmentCreate()
    {
        $department = factory(Department::class)->make();

        //401
        $response = $this->post('api/department/save');
        $response->assertStatus(401);

        //422
        $response = $this->post('api/department/save', [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //201
        $response = $this->post('api/department/save', [
            'name' => $department->name,
            'description' => $department->description,
            'company_uuid' => $department->company_uuid
        ], $this->getHeader());
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'department'
        ]);
    }

    /**
     * Update department
     *
     * @return void
     */
    public function testUpdateDepartment()
    {
        $department = factory(Department::class)->create();

        //401
        $response = $this->patch('api/department/update/1', []);
        $response->assertStatus(401);

        //422
        $response = $this->patch('api/department/update/'.$department->uuid, [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //200
        $response = $this->patch('api/department/update/'.$department->uuid, [
            'name' => $department->name,
            'description' => $department->description,
            'company_uuid' => $department->company_uuid
        ], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Delete department
     *
     * @return void
     */
    public function testDeleteDepartment()
    {
        $department = factory(Department::class)->create();
        $sample = factory(Department::class)->make();

        //401
        $response = $this->delete('api/department/delete/1', []);
        $response->assertStatus(401);

        //404
        $response = $this->delete('api/department/delete/' . $sample->uuid, [], $this->getHeader());
        $response->assertStatus(404);

        //200
        $response = $this->delete('api/department/delete/' . $department->uuid, [], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Get all department list
     *
     * @return void
     */
    public function testAllDepartmentList()
    {
        $department = factory(Department::class, 5)->create();

        //401
        $response = $this->get('api/department/all');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/department/all', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data'
        ]);
    }
}