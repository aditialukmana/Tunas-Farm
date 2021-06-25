<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class GrowInstallations extends BaseController
{
	public function index()
	{
		$data['title'] = 'Grow Installations - Tunas Farm';
		return view('growinstallations', $data);
	}
}
