<?php

namespace App\Http\Controllers\auth;

use App\User;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterSchoolController extends Controller
{
    use RegistersSchools;

    /**
     * Where to redirect users after school registration.
     *
     * @var string
     */
    protected $redirectTo = ('register/role');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming school registration request - school name.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator1(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100|unique:schools',
        ]);
    }

    /**
     * Get a validator for an incoming school registration request - remaining fields.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator2(array $data)
    {
        // Using max:191 instead of 255 due to MySQL version limitation

        return Validator::make($data, [
            'name' => 'required|max:100|unique:schools',
            'city' => 'required|max:50|unique:schools',
            'state' => 'required|max:2',
            'district' => 'required|max:25',
        ]);
    }

    /**
     * Create a new school instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\School
     */
    protected function createSchool(array $data)
    {
        return School::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'state' => $data['state'],
            'district' => $data['district'],
            'team1' => $data['team1'],
            'team2' => $data['team2'],
            'team3' => $data['team3'],
            'team4' => $data['team4'],
            'role_confirmation_token' => str_limit(md5($data['name'].str_random()), 25, '')
        ]);
    }

}
