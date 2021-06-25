<?php

namespace App\Controllers\View;
use App\Controllers\BaseController;

class Sites extends BaseController
{
	public function index()
	{
		$data['title'] = 'Sites - Tunas Farm';
		return view('sites', $data);
	}
}
