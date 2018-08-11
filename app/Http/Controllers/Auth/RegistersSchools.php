<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersSchools
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSchoolRegistrationForm1()
    {
        return view('auth.registerSchool1');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSchoolRegistrationForm2()
    {
        return view('auth.registerSchool2');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSchool1(Request $request)
    {
        $this->validator1($request->all())->validate();

//        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSchool2(Request $request)
    {
//        $this->validator2($request->all())->validate();

//        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}