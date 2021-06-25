<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class ActuatorSites extends BaseController
{
	public function index()
	{
		$data['title'] = 'Actuator Sites - Tunas Farm';
		return view('actuator-sites', $data);
	}
}
