<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Mail;

class RegisterSubmitTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Mail::fake();
    }

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
//    public function a_confirmation_email_is_sent_upon_registration()
//    {
//        $this->post(route('register.user'), $this->validParams());
//
//        Mail::assertQueued(PleaseConfirmYourEmail::class);
//    }

//    /** @test */
//    public function user_can_fully_confirm_their_email_addresses()
//    {
//        $this->post(route('register.user'), $this->validParams([
//            'email' => 'john@example.com',
//        ]));
//
//        $user = User::whereEmail('john@example.com')->first();
//
//        $this->assertFalse($user->email_confirmed);
//        $this->assertNotNull($user->email_confirmation_token);
//
//        $this->get(route('register.confirm', ['token' => $user->email_confirmation_token]))
//            ->assertRedirect(route('home'));
//
//        tap($user->fresh(), function ($user) {
//            $this->assertTrue($user->email_confirmed);
//            $this->assertNull($user->email_confirmation_token);
//        });
//    }

//    /** @test */
//    public function confirming_an_invalid_email_token()
//    {
//        $this->get(route('register.confirm', ['token' => 'invalid']))
//            ->assertRedirect(route('home'))
//            ->assertSessionHas('flash', 'Invalid email confirmation.');
//    }

//    /** @test */
//    public function a_confirmation_email_is_sent_to_confirm_users_role()
//    {
//        $this->post(route('register.school.part2'), $this->validParams());
//
//        Mail::assertQueued(PleaseConfirmThisPerson::class);
//    }


//    /** @test */
//    public function user_can_have_their_roles_confirmed()
//    {
//        $this->post(route('register.user'), $this->validParams([
//            'email' => 'john@example.com',
//        ]));
//
//        $user = User::whereEmail('john@example.com')->first();
//
//        $this->assertFalse($user->role_confirmed);
//        $this->assertNotNull($user->role_confirmation_token);
//
//        $this->get(route('register.confirm', ['token' => $user->email_confirmation_token]))
//            ->assertRedirect(route('home'));
//
//        tap($user->fresh(), function ($user) {
//            $this->assertTrue($user->role_confirmed);
//            $this->assertNull($user->role_confirmation_token);
//        });
//    }

//    /** @test */
//    public function confirming_an_invalid_role_token()
//    {
//        $this->get(route('register.confirm', ['token' => 'invalid']))
//            ->assertRedirect(route('home'))
//            ->assertSessionHas('flash', 'Invalid email confirmation.');
//    }
}
