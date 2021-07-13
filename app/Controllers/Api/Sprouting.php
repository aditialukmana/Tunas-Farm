<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Sprouting extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\SproutingModel';
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
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}


	public function create()
	{
		$data = $this->request->getPost();
		$this->validation->run($data, 'sprouting_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($data) {
			$this->model->save($data);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Sprouting';
			sys_log($user, $url, $message);
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
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
		if (!$data) {
			$data = $this->request->getJSON();
		}

		// $this->validation->run($data, 'sprouting_update');
		// $errors = $this->validation->getErrors();

		// if ($errors) {
		// 	log_message('error', implode(",", array_values($errors)));
		// 	return $this->fail($errors);
		// }

		if ($data) {
			$this->model->update($id, $data);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Update Sprouting';
			sys_log($user, $url, $message);
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
			$message = 'Delete Sprouting';
			sys_log($user, $url, $message);
			$response = [
				'status'   => 200,
				'error'    => null,
				'messages' => [
					'success' => 'Data Deleted'
				]
			];
			return $this->respondDeleted($response, 200);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id, 400);
		}
	}
}
