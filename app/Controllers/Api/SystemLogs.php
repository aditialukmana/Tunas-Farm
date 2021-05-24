<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class SystemLogs extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\SystemLogsModel';
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
	
		if ($this->model->save($data)) {
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
			];
			return $this->respondCreated($response, 201);
		} else {
			return $this->fail("Fail to save");
		}
	}

	public function update($id = null)
	{
		$data = $this->request->getRawInput();

		if ($this->model->update($id, $data)) {
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data,
			];
			return $this->respondUpdated($response, 201);
		} else {
			return $this->fail("Fail to save");
		}
	}

	
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
