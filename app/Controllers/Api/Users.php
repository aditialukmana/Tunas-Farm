<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Users extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\UsersModel';
	protected $format = 'json';
	protected $request;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		helper('system_log');
		helper('auth');
	}

	// get all product
	public function index()
	{
		$data = $this->model->getData();
		$response = [
			'status'   => 200,
			'messages' => [
				'success' => 'Get All Data'
			],
			'data'			=> $data
		];
		return $this->respond($response, 200);
	}

	// get single product
	public function show($id = null)
	{
		$data = $this->model->getData($id);
		if ($data) {
			$response = [
				'status'   => 200,
				'messages' => [
					'success' => 'Get Single Data'
				],
				'data'			=> $data
			];
			return $this->respond($response, 200);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id, 400);
		}
	}

	// create a product
	public function create()
	{
		$data = $this->request->getPost();
		$this->validation->run($data, 'user_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		$user = new \App\Entities\Users();
		$user->fill($data);
		$user->setPassword($data['password_hash']);

		if ($user) {
			$username = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Create User';
			sys_log($username, $url, $message);
			$this->model->save($user);
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $user
			];
			return $this->respondCreated($response, 201);
		} else {
			return $this->fail("Fail to save", 400);
		}
	}

	// update product
	public function update($id = null)
	{
		$data = $this->request->getRawInput();
		$user = user()->username;
		$url = $this->request->uri->getSegment(2);
		if (isset($data['password_hash'])) {
			$user_pass = new \App\Entities\Users();
			$user_pass->fill($data);
			$user_pass->setPassword($data['password_hash']);
			if ($user_pass) {
				$message_pass = 'Update Password';
				sys_log($user, $url, $message_pass);
				$this->model->update($id, $user_pass);
				$response = [
					'status'   => 201,
					'messages' => [
						'success' => 'Data Saved'
					],
					'data'			=> $user_pass
				];
				return $this->respondUpdated($response, 201);
			} else {
				return $this->fail("Fail to save", 400);
			}
		}
		if ($data) {
			$message = 'Update User';
			sys_log($user, $url, $message);
			$this->model->update($id, $data);
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
			];
			return $this->respondUpdated($response, 201);
		} else {
			return $this->fail("Fail to save", 400);
		}
	}

	// delete product
	public function delete($id = null)
	{
		$data = $this->model->find($id);
		if ($data) {
			$this->model->delete($id);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Delete User';
			sys_log($user, $url, $message);
			$response = [
				'status'   => 200,
				'error'    => null,
				'messages' => [
					'success' => 'Data Deleted'
				]
			];
			return $this->respondDeleted($response);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id, 400);
		}
	}
}
