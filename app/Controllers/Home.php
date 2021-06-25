<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function user()
	{
		
		$data['title'] = "Dashboard - Tunas Farm";
		if (!isset(user()->username)) {
			return redirect()->to('login'); 
		} else {
			return view('index', $data);
		}
	}
}
