<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Harvesting extends BaseController
{
	public function index()
	{
		$data['title'] = 'Harvesting - Tunas Farm';
		return view('harvesting', $data);
	}
}
