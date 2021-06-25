<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class ActuatorDevices extends BaseController
{
	public function index()
	{
		$data['title'] = 'Actuator Devices - Tunas Farm';
		return view('actuator-devices', $data);
	}
}
