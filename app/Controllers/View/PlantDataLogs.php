<?php

namespace App\Controllers\View;

use App\Controllers\BaseController;

class PlantDataLogs extends BaseController
{
	public function index()
	{
		$data['title'] = 'Plant Data Logs - Tunas Farm';
		return view('plantdatalogs', $data);
	}
}
