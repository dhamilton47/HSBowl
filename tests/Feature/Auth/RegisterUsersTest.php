<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUsersTest extends TestCase
{
//    /** @test */
//    public function users_can_register_an_account()
//    {
//        $response = $this->post(route('register.user'), [
//            'name' => 'John Doe',
//            'username' => 'johndoe',
//            'email' => 'johndoe@example.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//        ]);
//
//        $response->assertRedirect('register/school1');
//
//        $this->assertTrue(Auth::check());
//        $this->assertCount(1, User::all());
//
//        tap(User::first(), function ($user) {
//            $this->assertEquals('John Doe', $user->name);
//            $this->assertEquals('johndoe', $user->username);
//            $this->assertEquals('johndoe@example.com', $user->email);
//            $this->assertTrue(Hash::check('secret', $user->password));
//        });
//    }

    /** @test */
    public function name_is_optional()
    {
        $response = $this->post(route('register.user'), $this->validParams([
            'name' => '',
        ]));

        $response->assertRedirect(route('register.school.part1'));
//        $this->assertTrue(Auth::check());
//        $this->assertCount(1, User::all());
    }

    /** @test */
    public function name_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'name' => str_repeat('a', 192),
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('name');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'username' => '',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_is_url_safe()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'username' => 'spaces and symbols!',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'username' => str_repeat('a', 192),
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_is_unique()
    {
        create(\App\User::class, ['username' => 'john']);
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'username' => 'john',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function email_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'email' => '',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function email_is_valid()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'email' => 'not-an-email-address',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function email_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'email' => substr(str_repeat('a', 192) . '@example.com', -192),
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function email_is_unique()
    {
        create(User::class, ['email' => 'johndoe@example.com']);

        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'email' => 'johndoe@example.com',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function password_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'password' => '',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function password_must_be_confirmed()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'password' => 'foo',
            'password_confirmation' => 'bar'
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function password_must_be_at_least_6_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register.user'));

        $response = $this->post(route('register.user'), $this->validParams([
            'password' => 'foo',
            'password_confirmation' => 'foo',
        ]));

        $response->assertRedirect(route('register.user'));
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ], $overrides);
    }
}
