<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;
use App\Models\ContractsModel;

class Contracts extends BaseController
{
	public function index()
	{
		$data['title'] = 'Contracts - Tunas Farm';
		return view('contracts', $data);
	}
}
