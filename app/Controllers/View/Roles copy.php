<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class Roles extends BaseController
{
	public function index()
	{
		$data['title'] = 'Role - ' . COMPANY_NAME;
		return view('roles', $data);
	}
}
