<?php

namespace Modules\Employees\Tests\Feature;

use Tests\TestCase;
use Modules\Employees\Entities\Employee;

class EmployeeTest extends TestCase
{
    /**
     * Get employee list
     *
     * @return void
     */
    public function testEmployeeList()
    {
        $employee = factory(Employee::class, 5)->create();

        //401
        $response = $this->get('api/employee/list');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/employee/list', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data',
            'meta'
        ]);
    }

    /**
     * Create employee
     *
     * @return void
     */
    public function testEmployeeCreate()
    {
        $employee = factory(Employee::class)->make();

        //401
        $response = $this->post('api/employee/save');
        $response->assertStatus(401);

        //422
        $response = $this->post('api/employee/save', [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //201
        $response = $this->post('api/employee/save', [
            'firstname' => $employee->firstname,
            'lastname' => $employee->lastname,
            'email' => $employee->email,
            'department_uuid' => $employee->department_uuid
        ], $this->getHeader());
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'employee'
        ]);
    }

    /**
     * Update employee
     *
     * @return void
     */
    public function testUpdateEmployee()
    {
        $employee = factory(Employee::class)->create();

        //401
        $response = $this->patch('api/employee/update/1', []);
        $response->assertStatus(401);

        //422
        $response = $this->patch('api/employee/update/'.$employee->uuid, [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //200
        $response = $this->patch('api/employee/update/'.$employee->uuid, [
            'firstname' => $employee->firstname,
            'lastname' => $employee->lastname,
            'email' => $employee->email,
            'department_uuid' => $employee->department_uuid
        ], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Delete employee
     *
     * @return void
     */
    public function testDeleteEmployee()
    {
        $employee = factory(Employee::class)->create();
        $sample = factory(Employee::class)->make();

        //401
        $response = $this->delete('api/employee/delete/1', []);
        $response->assertStatus(401);

        //404
        $response = $this->delete('api/employee/delete/' . $sample->uuid, [], $this->getHeader());
        $response->assertStatus(404);

        //200
        $response = $this->delete('api/employee/delete/' . $employee->uuid, [], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Get all employee list
     *
     * @return void
     */
    public function testAllEmployeeList()
    {
        $employee = factory(Employee::class, 5)->create();

        //401
        $response = $this->get('api/employee/all');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/employee/all', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data'
        ]);
    }
}