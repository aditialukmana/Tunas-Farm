<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Contracts extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\ContractsModel';
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
			return $this->failNotFound('No Data Found with id ' . $id, 400);
		}
	}


	public function create()
	{
		$company = $this->request->getPost('company');
		$site = $this->request->getPost('site');
		$start = $this->request->getPost('start_period');
		$end = $this->request->getPost('end_period');
		$document = $this->request->getFile('contract_document');
		$document_name = $document->getName();
		$commitment = $this->request->getPost('contract_commitment');
		$partnership = $this->request->getPost('partnership_objective');
		$data = [
			'company'				=> $company,
			'site'					=> $site,
			'start_period'			=> $start,
			'end_period'			=> $end,
			'contract_document'		=> $document_name,
			'contract_commitment'	=> $commitment,
			'partnership_objective'	=> $partnership,
		];
		if ($data) {
			$this->model->save($data);
			$document->move(ROOTPATH . 'public/documents/', $document_name);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Contract';
			sys_log($user, $url, $message);
			$response = [
				'status'   => 201,
				'messages' => [
					'success' => 'Data Saved'
				],
				'data'			=> $data
			];
		} else {
			return $this->fail("Fail to save", 400);
		}
	}


	public function update($id = null)
	{
		$data = $this->request->getRawInput();
		$this->validation->run($data, 'contracts_update');
		$errors = $this->validation->getErrors();

		if ($errors) {
			log_message('error', implode(",", array_values($errors)));
			return $this->fail($errors);
		}

		if ($data) {
			$this->model->update($id, $data);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Update Contract';
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


	public function delete($id = null)
	{
		$data = $this->model->find($id);
		if ($data) {
			$this->model->delete($id);
			$user = user()->username;
			$url = $this->request->uri->getSegment(2);
			$message = 'Delete Contract';
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
