<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PlantDataLogs extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\PlantDataLogsModel';
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
		$image = $this->request->getFile('image');
        $image->move(ROOTPATH . 'public/uploads');
		$data = [
			'name' => $this->request->getPost('name'),
			'image' =>	$image,
			'code' => $this->request->getPost('code'),
			'est_harvest_time' => $this->request->getPost('est_harvest_time'),
			'est_weight' => $this->request->getPost('est_weight'),
		];

        if($data) {
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
			return $this->fail("Fail to save");
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
			return $this->respondCreated($response, 201);

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
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
			];
			return $this->respondCreated($response, 201);

		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
