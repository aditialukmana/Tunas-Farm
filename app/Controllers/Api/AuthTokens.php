<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class AuthTokens extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\AuthTokensModel';
	protected $format = 'json';
	protected $request;

	// get all product
	public function index()
	{
		$data = $this->model->getData();
		if ($data) {
			$response = [
				'status'   => 200,
				'messages' => [
					'success' => 'Get All Data'
				],
				'data'			=> $data
			];
			return $this->respond($response, 200);
		} else {
			$response = [
				'status'   => 400,
				'messages' => [
					'failed' => 'No Data'
				]
			];
			return $this->respond($response, 400);
		}
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

		if ($data) {
			$this->model->save($data);
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

		if ($data) {
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
			$url = $this->request->uri->getSegment(2);
			$message = 'Delete Transplanting';
			sys_log($url, $message);
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
