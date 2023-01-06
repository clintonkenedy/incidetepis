<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testHome()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }
    public function testHelpdesk()
    {
        $response = $this->get('/helpdesk');

        $response->assertStatus(200);
    }
    public function testPrueba()
    {
        $response = $this->get('/prueba');

        $response->assertStatus(200);
    }
}
