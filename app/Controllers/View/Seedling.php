<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Seedling extends BaseController
{
	public function index()
	{
		$data['title'] = 'Seedling - Tunas Farm';
		return view('seedling', $data);
	}
}
