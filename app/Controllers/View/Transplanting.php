<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Transplanting extends BaseController
{
	public function index()
	{
		$data['title'] = 'Transplanting - Tunas Farm';
		return view('transplanting', $data);
	}
}
