<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Devices extends BaseController
{
	public function index()
	{
		$data['title'] = 'Devices - Tunas Farm';
		return view('devices', $data);
	}
}
