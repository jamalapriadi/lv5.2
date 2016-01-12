<?php

namespace App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;

class AdminController extends Controller{

	public function __costruct(){
		$auth=auth()->guard('admin');

		if(!$auth->check()){
            abort(403,"Anda tidak memiliki hak akses ke halaman ini");
        }
	}

	public function index(){
		return View('admin.index');
	}
}