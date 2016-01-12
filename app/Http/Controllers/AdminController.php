<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth,Session,Redirect;

class AdminController extends Controller{
	public function index(){
		return View('admin.index');
	}

	public function logout(){
		auth()->logout;

		Session::flash('pesan',"<div class='alert alert-success'>Anda Berhasil Keluar</div>");
		return Redirect::to('auth/login');
	}
}