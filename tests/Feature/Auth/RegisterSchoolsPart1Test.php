<?php

namespace Tests\Feature\Auth;

use App\School;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterSchoolsPart1Test extends TestCase
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

//    /** @test */
//    public function a_user_can_register_for_a_school_already_in_the_database()
//    {
        // Determine if the school is already in the database
//        $response = $this->post(route('register.continue.school.part1'), [
//            'name' => 'John Doe High School',
//        ]);

        // Check for the school name
//        $this->assertTrue(Auth::check());
//        $this->assertEquals('John Doe High School', School::first()->name);
//        $this->assertCount(1, School::all());

         // if not, get school info

        // redirect to next part of registration

//        $response->assertRedirect('register/role');
//

//
//        tap(School::first(), function ($school) {

//            $this->assertEquals('johndoe', $user->username);
//            $this->assertEquals('johndoe@example.com', $user->email);
//            $this->assertTrue(Hash::check('secret', $user->password));
//        });
//    }

//    /** @test */
//    public function a_user_can_register_for_a_school_not_yet_in_the_database()
//    {
//        // Determine if the school is already in the database
//        $response = $this->post(route('register.school.part1'), [
//            'name' => 'John Doe High School',
//        ]);
//
//        // if not, get the remaining school info
//        $response->assertRedirect('register/school2');



        // redirect to next part of registration

//        $response->assertRedirect('register/role');
//
//        $this->assertTrue(Auth::check());
//        $this->assertCount(1, School::all());
//
//        tap(School::first(), function ($school) {
//            $this->assertEquals('John Doe High School', $school->name);
//            $this->assertEquals('johndoe', $user->username);
//            $this->assertEquals('johndoe@example.com', $user->email);
//            $this->assertTrue(Hash::check('secret', $user->password));
//        });
//    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => 'John Doe High School',
        ], $overrides);
    }
}
