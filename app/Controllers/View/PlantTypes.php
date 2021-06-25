<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class PlantTypes extends BaseController
{

	public function index()
	{
		$data['title'] = 'Plant Types - Tunas Farm';
		return view('planttypes', $data);
	}
}
