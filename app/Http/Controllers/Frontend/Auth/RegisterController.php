<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Frontend\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::USER_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    /**
     * Guardの認証方法を指定
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * 新規登録画面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_first'  => ['required', 'string', 'max:100'],
            'name_second' => ['required', 'string', 'max:100'],
            'kana_first'  => ['required', 'string', 'max:100', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'kana_second' => ['required', 'string', 'max:100', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'gender'      => ['required', 'integer', 'between:1,2'],
            'birthday'    => ['required', 'date_format'],
            'phone'       => ['required', 'numeric', 'digits_between:8,11'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name_first'  => $data['name_first'],
            'name_second' => $data['name_second'],
            'kana_first'  => $data['kana_first'],
            'kana_second' => $data['kana_second'],
            'gender'      => $data['gender'],
            'birthday'    => $data['birthday'],
            'phone'       => $data['phone'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
        ]);
    }
}
