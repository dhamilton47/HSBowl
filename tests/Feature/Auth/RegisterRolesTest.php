<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterRolesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function name_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'name' => '',
        ]));
        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('name');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function a_user_has_selected_a_role()
    {
        $this->withExceptionHandling();
        $this->from(route('register.role'));

        $response = $this->post(route('register.role'), $this->validParams([
            'role' => '',
        ]));
//        dd($response);
//        $response->assertRedirect(route('register.role'));
//        $response->assertSessionHasErrors('role');

    }

//    /** @test */
//    public function a_user_registers_for_a_set_of_permissions()
//    {
//        // Get the role
//        $response = $this->post(route('register.school.part1'), [
//            'role' => 'John Doe High School',
//        ]);
//    }
    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
//        ], $overrides);
//    }
//    private function validParams($overrides = [])
//    {
//        return array_merge([
            'role' => 'user',
            'team1' => true,
            'team2' => true,
            'team3' => true,
            'team4' => true,
//            'teams' => [1, 2, 3, 4],
        ], $overrides);
    }
}
