<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class PrivilegeSettings extends BaseController
{
	public function index()
	{
		$data['title'] = 'Privilege Settings - Tunas Farm';
		return view('privilegesettings', $data);
	}
}
