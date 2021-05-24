<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Devices extends BaseController
{
	public function index()
	{
		return view('devices');
	}
}
