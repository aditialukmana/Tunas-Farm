<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class SystemLogs extends BaseController
{
	public function index()
	{
		$data['title'] = 'System Logs - Tunas Farm';
		return view('systemlogs', $data);
	}
}
