<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Companies extends BaseController
{
	public function index()
	{
		$data['title'] = 'Company - Tunas Farm';
		return view('companies', $data);
	}
}
