<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterUsersTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Mail::fake();
    }

    /** @test */
    public function users_can_register_an_account()
    {
        $response = $this->post(route('register'), [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('');

        $this->assertTrue(Auth::check());
        $this->assertCount(1, User::all());

        tap(User::first(), function ($user) {
            $this->assertEquals('John Doe', $user->name);
            $this->assertEquals('johndoe', $user->username);
            $this->assertEquals('johndoe@example.com', $user->email);
            $this->assertTrue(Hash::check('secret', $user->password));
        });
    }

    /** @test */
    public function a_confirmation_email_is_sent_upon_registration()
    {
        $this->post(route('register'), $this->validParams());

        Mail::assertQueued(PleaseConfirmYourEmail::class);
    }

    /** @test */
    public function user_can_fully_confirm_their_email_addresses()
    {
        $this->post(route('register'), $this->validParams([
            'email' => 'john@example.com',
        ]));

        $user = User::whereEmail('john@example.com')->first();

        $this->assertFalse($user->confirmed);
        $this->assertNotNull($user->confirmation_token);

        $this->get(route('register.confirm', ['token' => $user->confirmation_token]))
            ->assertRedirect(route('home'));

        tap($user->fresh(), function ($user) {
            $this->assertTrue($user->confirmed);
            $this->assertNull($user->confirmation_token);
        });
    }

    /** @test */
    public function confirming_an_invalid_token()
    {
        $this->get(route('register.confirm', ['token' => 'invalid']))
            ->assertRedirect(route('home'))
            ->assertSessionHas('flash', 'Invalid email confirmation.');
    }

    /** @test */
    public function name_is_optional()
    {
        $response = $this->post(route('register'), $this->validParams([
            'name' => '',
        ]));

        $response->assertRedirect('/');
        $this->assertTrue(Auth::check());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function user_name_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'name' => str_repeat('a', 192),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('name');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_username_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'username' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_is_url_safe()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'username' => 'spaces and symbols!',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'username' => str_repeat('a', 192),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function username_is_unique()
    {
        create(\App\User::class, ['username' => 'john']);
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'username' => 'john',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('username');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function user_email_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'email' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_email_is_valid()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'email' => 'not-an-email-address',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_email_cannot_exceed_191_chars()
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'email' => substr(str_repeat('a', 192) . '@example.com', -192),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_email_is_unique()
    {
        create(User::class, ['email' => 'johndoe@example.com']);

        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'email' => 'johndoe@example.com',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function user_password_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'password' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_password_must_be_confirmed()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'password' => 'foo',
            'password_confirmation' => 'bar'
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, User::all());
    }

    /** @test */
    public function user_password_must_be_at_least_6_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'password' => 'foo',
            'password_confirmation' => 'foo',
        ]));

        $response->assertRedirect(route('register'));
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
