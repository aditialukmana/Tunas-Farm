<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Customers extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\CustomersModel';
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
		$this->validation->run($data, 'customers_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

        if($data) {
		$this->model->save($data);
		return redirect()->to(base_url('view/customers'));
		} else {
			return $this->fail("Fail to save");
		}
	}

	// update product
	public function update($id = null)
	{
		$data = $this->request->getRawInput();
		$this->validation->run($data, 'customers_update');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($data) {
			$this->model->update($id, $data);
			return redirect()->to(base_url('view/customers'));
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
			return redirect()->to(base_url('view/customers'));
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
