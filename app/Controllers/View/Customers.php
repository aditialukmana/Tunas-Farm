<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Customers extends BaseController
{
	public function index()
	{

		$data['title'] = 'Customers - Tunas Farm';
		return view('customers', $data);
	}
}
