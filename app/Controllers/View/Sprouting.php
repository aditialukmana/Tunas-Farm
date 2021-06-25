<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class Sprouting extends BaseController
{
	public function index()
	{
		$data['title'] = 'Sprouting - Tunas Farm';
		return view('sprouting', $data);
	}
}
