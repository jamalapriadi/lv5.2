<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Admin;
use Validator,Redirect,DB,Hash,Session;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin(){
        return View('login.index');
    }

    public function proses_login(){
        $rules=[
            'email'=>'required|email',
            'password'=>'required'
        ];

        $pesan=[
            'email.required'=>'Email harus diisi',
            'email.email'=>'Email tidak valid',
            'password.required'=>'Password harus diisi'
        ];

        $validasi=Validator::make(Input::all(),$rules,$pesan);

        if($validasi->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validasi);
        }else{
            //cek di tabel user
            $auth=auth()->guard('admin');

            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            if ($auth->attempt($userdata)) {
                return Redirect::to('admin');
            }else{
                echo "Gagal";
            }
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logout(){
        auth()->guard('admin')->logout();

        Session::flash('pesan',"Anda Berhasil Keluar");
        return Redirect::to('auth/login');
    }
}
