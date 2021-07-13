<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Companies extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\CompaniesModel';
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
		$data = $this->model->joinData();
		if($data) {
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
					'success' => 'Fail Get All Data'
				],
				'data'			=> $data
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


	public function create()
	{
		$nama = $this->request->getPost('name');
		$arr = explode(" ", $nama);
		$skt = '';

		foreach ($arr as $kata) {
			$skt .= substr($kata, 0, 1);
		}

		$prefix_code	= $skt;
		$address		= $this->request->getPost('address');
		$customer		= $this->request->getPost('customer');
		$phone 			= $this->request->getPost('phone');
		$email 			= $this->request->getPost('email');

		$data  = [
			'prefix_code'	=> $prefix_code,
			'name' 			=> $nama,
			'address'		=> $address,
			'customer'		=> $customer,
			'phone'			=> $phone,
			'email'			=> $email
		];
		$this->validation->run($data, 'company_create');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($data) {
			$this->model->save($data);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Company';
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

		if ($data) {
			$this->model->update($id, $data);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Update Company';
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
			$message = 'Delete Company';
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
