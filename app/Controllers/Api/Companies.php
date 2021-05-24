<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Companies extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\CompaniesModel';
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

	
	public function create()
	{
		$nama = $this->request->getPost('name');
		$arr = explode(" ",$nama);
		$skt = '';

		foreach($arr as $kata) {
			$skt .= substr($kata, 0, 1);
		}

		$prefix_code = $skt;
		$address = $this->request->getPost('address');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');

		$data  = [
			'prefix_code' => $prefix_code,
			'name' => $nama,
			'address' => $address,
			'phone' => $phone,
			'email' => $email
		];
		$this->validation->run($data, 'company_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		// $company = new \App\Entities\Companies();
		// $company->fill($data);
		// if (isset($data['prefix_code'])) {
		// 	unset($company->prefix_code);
		// } else {
		// 	$company->setPrefixCode($data['prefix_code']);
		// }

		// $user->created_by = 0;

		if ($this->model->save($data)) {
			return redirect()->to(base_url('view/companies'));
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
			return redirect()->to(base_url('view/companies'));
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
			return redirect()->to(base_url('view/companies'));
		} else {
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}
}
