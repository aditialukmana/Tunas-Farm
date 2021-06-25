<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class GrowInstallations extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\GrowInstallationsModel';
	protected $format = 'json';
	protected $request;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		helper('system_log');
	}

	// get all product
	public function index()
	{
		$data = $this->model->getData();
		return $this->respond(array('data'=>$data), 200);
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

		if ($data) {
			$this->model->save($data);
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Grow Installation';
			sys_log($url, $message);
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

	// update product
	public function update($id = null)
	{
		$data = $this->request->getRawInput();

		if ($data) {
			$this->model->update($id, $data);
			$url = $this->request->uri->getSegment(2);
			$message = 'Update Grow Installation';
			sys_log($url, $message);
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
			];
			return $this->respondUpdated($response, 201);
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
			$url = $this->request->uri->getSegment(2);
			$message = 'Delete Grow Installation';
			sys_log($url, $message);
			$response = [
				'status'   => 200,
				'error'    => null,
				'messages' => [
					'success' => 'Data Deleted'
				]
			];
			return $this->respondDeleted($response, 200);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
