<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Grooming extends BaseController
{
	public function index()
	{
		$data['title'] = 'Grooming - Tunas Farm';
		return view('grooming', $data);
	}
}
