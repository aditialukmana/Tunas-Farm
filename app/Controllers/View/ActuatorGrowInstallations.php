<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class ActuatorGrowInstallations extends BaseController
{
	public function index()
	{
		$data['title'] = 'Actuator Grow Installations - Tunas Farm';
		return view('actuator-growinstallations', $data);
	}
}
