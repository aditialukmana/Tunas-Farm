<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class AuthGroupsUsers extends BaseController
{
	public function index()
	{
		$data['title'] = 'Role Users - Tunas Farm';
		return view('auth-groups-users', $data);
	}
}
