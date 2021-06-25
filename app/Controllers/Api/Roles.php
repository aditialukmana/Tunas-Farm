<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Roles extends ResourceController
{
	// use ResponseTrait;

	// protected $modelName = 'App\Models\RolesModel';
	// protected $format = 'json';
	// protected $request;

	// public function __construct()
	// {
	// 	$this->validation = \Config\Services::validation();
	// }

	// // get all product
	// public function index()
	// {
	// 	$data = $this->model->getData();
	// 	return $this->respond($data, 200);
	// }

	// // get single product
	// public function show($id = null)
	// {
	// 	$data = $this->model->getData($id);
	// 	if ($data) {
	// 		return $this->respond($data);
	// 	} else {
	// 		return $this->failNotFound('No Data Found with id ' . $id);
	// 	}
	// }

	// // create a product
	// public function create()
	// {
	// 	$data = $this->request->getPost();
	
	// 	if ($data) {
	// 		$this->model->save($data);
	// 		$response = [
	// 			'status'   => 201,
	// 			'messages' => [
	// 				'success' => 'Data Saved'
	// 			],
	// 			'data'			=> $data
	// 		];
	// 		return $this->respondCreated($response, 201);
	// 	} else {
	// 		return $this->fail("Fail to save");
	// 	}
	// }

	// // update product
	// public function update($id = null)
	// {
	// 	$data = $this->request->getRawInput();
	// 	$this->validation->run($data, 'role_update');
	// 	$errors = $this->validation->getErrors();

	// 	if ($errors) {
	// 		log_message('error', implode(",", array_values($errors)));
	// 		return $this->fail($errors);
	// 	}

	// 	$role = new \App\Entities\Roles();
	// 	$role->fill($data);
	// 	// $role->created_by = 0;

	// 	if ($this->model->update($id, $role)) {
	// 		$response = [
	// 			'status'   => 201,
	// 			'messages' => [
	// 				'success' => 'Data Saved'
	// 			],
	// 			'data'			=> $role,
	// 		];
	// 		return $this->respondUpdated($response, 201);
	// 	} else {
	// 		return $this->fail("Fail to save");
	// 	}
	// }

	// // delete product
	// public function delete($id = null)
	// {
	// 	$data = $this->model->find($id);
	// 	if ($data) {
	// 		$this->model->delete($id);
			// $response = [
			// 	'status'   => 200,
			// 	'error'    => null,
			// 	'messages' => [
			// 		'success' => 'Data Deleted'
			// 	]
			// ];

	// 		return $this->respondDeleted($response);
	// 	} else {
	// 		return $this->failNotFound('No Data Found with id ' . $id);
	// 	}
	// }
}
