<?php

namespace App\Http\Controllers\Auth;

use App\School;
use App\User;
use Illuminate\Http\Request;
use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MultipartRegistrationController extends RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $user_store = [];
    protected $school_store = [];

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = 'register/school2';
    protected $redirectTo = 'register/school1';

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
//    public function register(Request $request)
    {
//        dd("Stop #1");
//        dd($this->school_store);

        $this->redirectTo = 'register/school1';

        $temp = $this->validatorUser($request->all())->validate();
//        dd($temp);
//        $user = $this->createUser($request->all());
//        dd($this->school_store);

        event(new Registered($user = $this->createUser($request->all())));

        $this->guard()->login($user);
//        dd($this->user_store);
//        dd(auth()->user());
//        dd($this->registered($request, $user) ?: redirect($this->redirectPath()));
//        return redirect(route('register.school.part1'));
//        return redirect('register/school1');
//        return redirect($this->redirectTo);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorUser(array $data)
    {
        // Using max:191 instead of 255 due to MySQL version limitation
//        dd('I am here');
        return Validator::make($data, [
            'name' => 'max:191',
            'username' => 'required|max:191|unique:users|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return array  $user_store
     */
    protected function createUser(array $data)
    {
//        dd($this->user_store);
//        return $this->user_store[] = [
//        $this->user_store[] = [
//            'name' => $data['name'],
//            'username' => $data['username'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'email_confirmation_token' => str_limit(md5($data['email'].str_random()), 25, '')
//        ];

//        dd($this->user_store);

//        return $this->user_store;
        return User::forceCreate([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_confirmation_token' => str_limit(md5($data['email'].str_random()), 25, '')
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSchoolPart1(Request $request)
//    public function register(Request $request)
    {
//        dd("Stop #2");
//        dd($this->school_store);
//        DD(School::whereName($request->name)->get() == []);
        $this->redirectTo = 'register/school2';
        if (! $school = School::whereName($request->name)->get() == []) {
            auth()->user()->saveSchoolId($school);
            return redirect('register/role');
        }
//        dd($this->validatorSchoolPart1($request->all())->validate());
        $this->validatorSchoolPart1($request->all())->validate();

        $school = $this->createSchoolPart1($request->all());

//        dd($this->school_store);
//        dd($this->user_store);


//        event(new Registered($school = $this->createSchoolPart1($request->all())));
//
//        $this->guard()->login($user);
//
        return redirect($this->redirectTo, compact('school'));
//        return $this->registered($request, $school)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorSchoolPart1(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:191|unique:schools',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return array
     */
    protected function createSchoolPart1(array $data)
    {
        return $this->school_store[] = ['name' => $data['name']];

        //        return User::forceCreate([
//            'name' => $data['name'],
//            'username' => $data['username'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'email_confirmation_token' => str_limit(md5($data['email'].str_random()), 25, '')
//        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSchoolPart2(Request $request)
    {
//        dd("Stop #3");
//        dd($this->school_store);

        $this->redirectTo = 'register/role';

        $this->validatorSchoolPart2($request->all())->validate();

        $school = $this->createSchoolPart2($request->all());
//        event(new Registered($school = $this->createSchoolPart2($request->all())));

//        $this->guard()->login($user);
//        dd($this->school_store);

        return redirect($this->redirectTo);
//        return $this->registered($request, $school)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorSchoolPart2(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100|unique:schools',
            'city' => 'required|max:50',
            'state' => 'required|max:2',
            'district' => 'required|max:25',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createSchoolPart2(array $data)
    {
        return School::forceCreate([
            'name' => $data['name'],
            'city' => $data['city'],
            'state' => $data['state'],
            'district' => $data['district'],
            'team1' => $data['team1'] == 'on',
            'team2' => $data['team2'] == 'on',
            'team3' => $data['team3'] == 'on',
            'team4' => $data['team4'] == 'on',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerRole(Request $request)
//    public function register(Request $request)
    {
        dd("Stop #4");
        dd($this->school_store);

        $this->redirectTo = 'register/role';

        $this->validatorRole($request->all())->validate();

        dd($user = $this->createRole($request->all()));
//        event(new Registered($user = $this->createRole($request->all())));
//        dd($user);
//        $this->guard()->login($user);
        return view('auth.registerSchool1');
//        return redirect($this->redirectTo);

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRole(array $data)
    {
        return Validator::make($data, [
            'role' => 'required',
       ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createRole(array $data)
    {

//        dd('im here');
        dd($this->user_store);
        $this->user_store[] = [
            'role' => $data['role'],
            'role_confirmation_token' => str_limit(md5($this->user_store['email'].str_random()), 25, ''),
//            'role_confirmation_token' => str_limit(md5($data['email'].str_random()), 25, ''),
            'team1' => $data['team1'],
            'team2' => $data['team2'],
            'team3' => $data['team3'],
            'team4' => $data['team4'],
        ];

        return User::forceCreate($this->user_store);

//        return User::forceCreate([
//            'role' => $data['role'],
//            'role_confirmation_token' => str_limit(md5($data['email'].str_random()), 25, ''),
//            'team1' => $data['team1'],
//            'team2' => $data['team2'],
//            'team3' => $data['team3'],
//            'team4' => $data['team4'],
//        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User                $user
     * @return void
     */
    protected function registered(Request $request, $user)
    {
        Mail::to($user)->send(new PleaseConfirmYourEmail($user));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserRegistrationForm()
    {
        return view('auth.registerUser');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSchoolRegistrationFormPart1()
    {
        return view('auth.registerSchool1');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSchoolRegistrationFormPart2()
    {
        return view('auth.registerSchool2');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoleRegistrationForm()
    {
        return view('auth.registerRole');
    }

}
