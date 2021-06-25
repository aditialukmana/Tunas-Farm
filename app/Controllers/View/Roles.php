<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class Roles extends BaseController
{
	public function index()
	{
		$data['title'] = 'Roles - Tunas Farm';
		return view('roles', $data);
	}
}
