<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Customers extends BaseController
{
	public function index()
	{
		return view('customers');
	}
}