<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class SystemLogs extends BaseController
{
	public function index()
	{
		return view('systemlogs');
	}
}
