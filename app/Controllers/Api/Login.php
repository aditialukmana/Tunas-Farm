<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;
use App\Models\AuthGroupsUsersModel;

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
		$db = \Config\Database::connect();
		$builder = $db->table('auth_groups_users');
		$role_user = new AuthGroupsUsersModel();

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
		$user_id = $data->id;

		if ($data) {
			$password = $data->password_hash;
			$config = config('Auth');

			if (
				(defined('PASSWORD_ARGON2I') && $config->hashAlgorithm == PASSWORD_ARGON2I)
				||
				(defined('PASSWORD_ARGON2ID') && $config->hashAlgorithm == PASSWORD_ARGON2ID)
			) {
				$hashOptions = [
					'memory_cost' => $config->hashMemoryCost,
					'time_cost'   => $config->hashTimeCost,
					'threads'     => $config->hashThreads
				];
			} else {
				$hashOptions = [
					'cost' => $config->hashCost
				];
			}

			$role = $role_user->where('user_id', $user_id)->first();

			if (password_verify(base64_encode(hash('sha384', $pass, true)), $password)) {
				if ($role['group_id'] == 3) {
					$dataToken = $user . date("Ymd");
					$token = password_hash($dataToken, PASSWORD_DEFAULT);
					token($user_id, $token);
					$response = [
						'status'   => 200,
						'messages' => [
							'success' => 'Login Success'
						],
						'id'			=> $user_id,
						'token'			=> $token,
					];
					return $this->respond($response, 200);
				} else {
					$response = [
						'status' => 401,
						'failed' => 'Role not Valid as Owner',
					];
					return $this->respond($response, 401);
				}
			} else {
				$response = [
					'status' => 400,
					'failed' => 'Login Failed',
				];
				return $this->respond($response, 400);
			}
		}
	}
}
