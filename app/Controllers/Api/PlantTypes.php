<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PlantTypes extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\PlantTypesModel';
	protected $format = 'json';
	protected $request;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
	}

	// get all data
	public function index()
	{
		$data = $this->model->getData();
		return $this->respond($data, 200);
	}

	// get single data
	public function show($id = null)
	{
		$data = $this->model->getData($id);
		if ($data) {
			return $this->respond($data);
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}

	// create a data
	public function create()
	{
		$code = $this->request->getPost('code');
		$name = $this->request->getPost('name');
		$image = $this->request->getFile('image');
		$image_name = $image->getName();
		$harvest = $this->request->getPost('est_harvest_time');
		$weight = $this->request->getPost('est_weight');
		$data = [
			'code'				=>$code,
			'name'				=>$name,
			'image'				=>$image_name,
			'est_harvest_time'	=>$harvest,
			'est_weight'		=>$weight
		];
		$this->validation->run($data, 'plant_type_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($this->model->save($data)) {
			$image->move(ROOTPATH.'public/uploads/', $image_name);
		} else {
			return $this->fail("Fail to save");
		}
	}

	// update data
	public function update($id = null)
	{
		$data = $this->request->getRawInput();
		$this->validation->run($data, 'plant_type_update');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($this->model->update($id, $data)) {
			return redirect()->to(base_url('view/planttypes'));
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
			return redirect()->to(base_url('view/planttypes'));
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
