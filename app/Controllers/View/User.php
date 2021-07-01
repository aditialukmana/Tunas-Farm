<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class User extends BaseController
{
	public function index()
	{
		$data['title'] = 'Users - Tunas Farm';
		return view('users', $data);
	}
}
