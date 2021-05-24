<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Users extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\UsersModel';
	protected $format = 'json';
	protected $request;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
	}

	// get all product
	public function index()
	{
		$data = $this->model->getData();
		return $this->respond($data, 200);
	}

	// get single product
	public function show($id = null)
	{
		$data = $this->model->getData($id);
		if ($data) {
			return $this->respond($data);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
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
		if (isset($data['password'])) {
			unset($user->password);
		} else {
			$user->setPassword($data['password']);
		}

		// $user->created_by = 0;

		if ($this->model->save($user)) {
			return redirect()->to(base_url(''));
		} else {
			return $this->fail("Fail to save");
		}
	}

	// update product
	public function update($id = null)
	{
		$data = $this->request->getPost();
		$this->validation->run($data, 'user_update');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		$user = new \App\Entities\Users();
		$user->fill($data);
		
		$user->setPassword($data['password']);
		
		if ($this->model->update($id, $user)) {
			return redirect()->to(base_url(''));
		} else {
			return $this->fail("Fail to save");
		}
	}

	// delete product
	public function delete($id = null)
	{
		$data = $this->model->find($id);
		if ($data) {
			$this->model->delete($id);
			$response = [
				'status'   => 200,
				'error'    => null,
				'messages' => [
					'success' => 'Data Deleted'
				]
			];

			return $this->respondDeleted($response);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
