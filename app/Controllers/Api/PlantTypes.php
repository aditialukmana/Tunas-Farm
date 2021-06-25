<?php

namespace App\Controllers\Api;

use Myth\Auth\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class PlantTypes extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\PlantTypesModel';
	protected $format = 'json';
	protected $request;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		helper('system_log');
	}

	// get all data
	public function index()
	{
		$data = $this->model->getData();
		if($data) {
			$response = [
				'status'   => 200,
				'messages' => [
					'success' => 'Get All Data'
				],
				'data'			=> $data
			];
		} else {
			$response = [
				'status'   => 400,
				'messages' => [
					'success' => 'Fail Get All Data'
				],
				'data'			=> $data
			];
		}
		return $this->respond($response, 200);
	}

	// get single data
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

	// create a data
	public function create()
	{
		$code = rand(1, 100);
		if ($code <= 10) {
			$kodePlant = "PT0" . $code;
		} else {
			$kodePlant = "PT" . $code;
		}
		$name = $this->request->getPost('name');
		$image = $this->request->getFile('image');
		$image_name = $image->getName();
		$harvest = $this->request->getPost('est_harvest_time');
		$weight = $this->request->getPost('est_weight');
		$data = [
			'code'				=> $kodePlant,
			'name'				=> $name,
			'image'				=> $image_name,
			'est_harvest_time'	=> $harvest,
			'est_weight'		=> $weight
		];
		// $this->validation->run($data, 'plant_type_create');
		// $errors = $this->validation->getErrors();

		// if ($errors) {
		// 	log_message('error', implode(",", array_values($errors)));
		// 	return $this->fail($errors);
		// }

		if ($this->model->save($data)) {
			$image->move(ROOTPATH . 'public/uploads/', $image_name);
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Plant Type';
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

	// update data
	public function update($id = null)
	{
		$json = $this->request->getJSON();
		if ($json) {
			$data = [
				'name' => $json->name,
				'est_harvest_time' => $json->est_harvest_time,
				'est_weight' => $json->est_weight
			];
		} else {
			$input = $this->request->getRawInput();
			$data = [
				'name' => $input['name'],
				'est_harvest_time' => $input['est_harvest_time'],
				'est_weight' => $input['est_weight']
			];
		}
		// $this->validation->run($data, 'plant_type_update');
		// $errors = $this->validation->getErrors();

		// if ($errors) {
		// 	log_message('error', implode(",", array_values($errors)));
		// 	return $this->fail($errors);
		// }

		if ($data) {
			$this->model->update($id, $data);
			$url = $this->request->uri->getSegment(2);
			$message = 'Update Plant Type';
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

	// delete data
	public function delete($id = null)
	{
		$data = $this->model->find($id);
		if ($data) {
			$this->model->delete($id);
			$url = $this->request->uri->getSegment(2);
			$message = 'Delete Plant Type';
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
