<?php

namespace App\Controllers\Api;

use Config\Email;
use CodeIgniter\Controller;
use Myth\Auth\Entities\User;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Login extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\UsersModel';
	protected $format = 'json';
	protected $request;


	public function __construct()
	{
		helper('login');
	}

	// get user
	public function index()
	{
		$json = $this->request->getJSON();
		$user = $json->username;
		$pass = $json->password;

		$data = $this->model->where('username', $user)->first();

		if ($data) {
			$password = $data['password_hash'];
			$verify_pass = password_verify(base64_encode(hash('sha384', $pass)), $password);

			if ($verify_pass) {
				$dataToken = $user . date("Ymd");
				$token = password_hash($dataToken, PASSWORD_DEFAULT);
				$user_id = $data['id'];
				return $this->respond($token, 200);
				token($token, $user_id);
			}
		}
	}
}
