<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlunosRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_checking_the_home_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_checsdking_the_dashboard_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_checking_the_alunos_list_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/alunos');

        $response->assertStatus(200);
    }

    public function test_checking_the_alunos_page_create_route_returns_a_successful_response(): void
    {
        $response = $this->get('/alunos/novo');

        $response->assertStatus(200);
    }

    public function test_checking_the_alunos_page_edit_route_returns_a_successful_response(): void
    {
        $response = $this->get('/alunos/editar/1');

        $response->assertStatus(200);
    }
}
