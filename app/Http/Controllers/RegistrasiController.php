<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Input;
use Validator,Redirect,Hash;

class RegistrasiController extends Controller{
	public function index(){
		return View('registrasi.index');
	}

	public function proses(){
		$validasi=Validator::make(Input::all(),User::$rules,User::$pesan);

		if($validasi->fails()){
			return Redirect::back()
				->withInput()
				->withErrors($validasi);
		}else{
			$user=new Admin;
			$user->name=Input::get('nama');
			$user->email=Input::get('email');
			$user->password=Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('auth/login');
		}
	}
}