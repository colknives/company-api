<?php

namespace Modules\Companies\Tests\Feature;

use Tests\TestCase;
use Modules\Companies\Entities\Company;

class CompanyTest extends TestCase
{
    /**
     * Get company list
     *
     * @return void
     */
    public function testCompanyList()
    {
        $company = factory(Company::class, 5)->create();

        //401
        $response = $this->get('api/company/list');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/company/list', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data',
            'meta'
        ]);
    }

    /**
     * Create company
     *
     * @return void
     */
    public function testCompanyCreate()
    {
        $company = factory(Company::class)->make();

        //401
        $response = $this->post('api/company/save');
        $response->assertStatus(401);

        //422
        $response = $this->post('api/company/save', [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //201
        $response = $this->post('api/company/save', [
            'name' => $company->name,
            'description' => $company->description
        ], $this->getHeader());
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'company'
        ]);
    }

    /**
     * Update company
     *
     * @return void
     */
    public function testUpdateCompany()
    {
        $company = factory(Company::class)->create();

        //401
        $response = $this->patch('api/company/update/1', []);
        $response->assertStatus(401);

        //422
        $response = $this->patch('api/company/update/'.$company->uuid, [], $this->getHeader());
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //200
        $response = $this->patch('api/company/update/'.$company->uuid, [
            'name' => $company->name,
            'description' => $company->description
        ], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Delete company
     *
     * @return void
     */
    public function testDeleteCompany()
    {
        $company = factory(Company::class)->create();
        $sample = factory(Company::class)->make();

        //401
        $response = $this->delete('api/company/delete/1', []);
        $response->assertStatus(401);

        //404
        $response = $this->delete('api/company/delete/' . $sample->uuid, [], $this->getHeader());
        $response->assertStatus(404);

        //200
        $response = $this->delete('api/company/delete/' . $company->uuid, [], $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message'
        ]);
    }

    /**
     * Get all company list
     *
     * @return void
     */
    public function testAllCompanyList()
    {
        $company = factory(Company::class, 5)->create();

        //401
        $response = $this->get('api/company/all');
        $response->assertStatus(401);

        //200
        $response = $this->get('api/company/all', $this->getHeader());
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'data'
        ]);
    }
}