<?php

namespace App\Controllers\Api;

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
		if ($json) {
			$user = $json->username;
			$pass = $json->password;
		} else {
			$input = $this->request->getRawInput();
			$user = $input['username'];
			$pass = $input['password'];
		}

		
		// return $this->respond(array('json'=>$json, 'input'=>$input['username']), 200);

		// $json = $this->request->getJSON();
	

		$data = $this->model->where('username', $user)->first();

		if ($data) {
			$password = $data->password_hash;
			$verify_pass = password_verify(base64_encode(hash('sha384', $pass)), $password);

			if ($verify_pass) {
				$dataToken = $user . date("Ymd");
				$token = password_hash($dataToken, PASSWORD_DEFAULT);
				$user_id = $data['id'];
				$response = [
					'status'   => 200,
					'messages' => [
						'success' => 'Login Success'
					],
					'token'			=> $token
				];
				return $this->respond($response, 200);
				token($token, $user_id);
			} else {
				$response = [
					'status' => 400, 
					'failed' => 'Login Failed',
					'password' => $password,
					'pass hash'=> base64_encode(hash('sha384', $pass))
				];
				return $this->respond($response, 400);
			}
		}
	}
}
