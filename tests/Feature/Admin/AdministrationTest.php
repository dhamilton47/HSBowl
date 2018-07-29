<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministrationTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_administration_section()
    {
        $this->withExceptionHandling()
//            $this->signIn()
            ->signIn()
            ->get(route('admin.dashboard.index'))
            ->assertSee('You are on the administration dashboard')
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_guest_cannot_access_the_administration_section()
    {
        $this->withExceptionHandling()
            ->post(route('admin.dashboard.index'))
            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
