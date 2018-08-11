<?php

namespace Tests\Feature\Auth;

use App\School;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterSchoolsPart2Test extends TestCase
{
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }

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
    public function name_cannot_exceed_100_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'name' => str_repeat('a', 101),
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('name');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function name_is_unique()
    {
        create(\App\School::class, ['name' => 'John High School']);
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'name' => 'John High School',
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('name');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(1, School::all());
    }

    /** @test */
    public function city_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'city' => '',
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('city');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function city_cannot_exceed_50_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'city' => substr(str_repeat('a', 51) . 'city', -51),
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('city');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function state_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'state' => '',
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('state');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

//    /** @test */
//    public function state_is_valid()
//    {
//        $this->withExceptionHandling();
//        $this->from(route('register.school.part2'));
//
//        $response = $this->post(route('register.school.part2'), $this->validParams([
//            'state' => 'not-a-state',
//        ]));
//
//        $response->assertRedirect(route('register.school.part2'));
//        $response->assertSessionHasErrors('state');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
//    }

    /** @test */
    public function state_cannot_exceed_2_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'state' => substr(str_repeat('a', 3) . 'State', -3),
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('state');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function district_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'district' => '',
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('district');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
    }

    /** @test */
    public function district_cannot_exceed_25_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register.school.part2'));

        $response = $this->post(route('register.school.part2'), $this->validParams([
            'district' => substr(str_repeat('a', 26) . 'district', -26),
        ]));

        $response->assertRedirect(route('register.school.part2'));
        $response->assertSessionHasErrors('district');
//        $this->assertFalse(Auth::check());
//        $this->assertCount(0, School::all());
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
            'name' => 'John Doe High School',
            'city' => 'Some City',
            'state' => 'ST',
            'district' => 'Some District',
            'team1' => true,
            'team2' => true,
            'team3' => true,
            'team4' => true,
        ], $overrides);
    }
}
