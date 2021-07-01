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
}
