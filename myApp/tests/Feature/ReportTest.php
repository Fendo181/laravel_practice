<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_customersにGETメソッドでアクセスできる()
    {
        $response = $this->get('/api/customers');
        $response->assertStatus(200);
    }

    /**
     * POSTができる
     * @test
     */
    public function test_api_customersにPOSTメソッドでアクセスできる()
    {
        $response = $this->POST('/api/customers');
        $response->assertStatus(200);
    }

    /**
     * cutstomer_idにGETでアクセスできる
     * @test
     */
    public function test_api_cutstomer_idにGETメソッドでアクセスできる()
    {
        $response = $this->GET('/api/customers/1');
        $response->assertStatus(200);
    }

    /**
     * cutstomer_idに対しPUTでアクセスできる
     */
    public function test_api_cutstomer_idにPUTメソッドでアクセスできる()
    {
        $response = $this->PUT('/api/customers/1');
        $response->assertStatus(200);
    }

    /**
     * cutstomer_idに対しDELETEでアクセスできる
     */
    public function test_api_cutstomer_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->DELETE('/api/customers/1');
        $response->assertStatus(200);
    }

}
