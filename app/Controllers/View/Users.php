<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Users extends BaseController
{
	public function index()
	{
		
		return view('users');
	}
}
