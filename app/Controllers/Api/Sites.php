<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\URI;

class Sites extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\SitesModel';
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
			return $this->failNotFound('No Data Found with id ' . $id);
		}
	}

	// create a product
	public function create()
	{
		$name = $this->request->getPost('name');
		$company = $this->request->getPost('company');
		$type = $this->request->getPost('type');
		$subtype = $this->request->getPost('subtype');
		$floor = $this->request->getPost('floor');
		$area = $this->request->getPost('building_area');
		$photo = $this->request->getFile('photo');
		$address = $this->request->getPost('address');
		$photo_name = $photo->getName();
		$jalan = $this->request->getPost('jalan');
		$kota = $this->request->getPost('kota');
		$provinsi = $this->request->getPost('provinsi');
		$lat = $this->request->getPost('latitude');
		$long = $this->request->getPost('longtitude');
		$status = $this->request->getPost('building_status');
		$period = $this->request->getPost('rent_period');
		$cost = $this->request->getPost('rent_cost');

		$arr = explode(" ", $company);
		$skt = '';

		foreach ($arr as $kata) {
			$skt .= substr($kata, 0, 1);
		}

		$code	= $skt . "SIndex";

		$data = [
			'code'				=> $code,
			'name'				=> $name,
			'company'			=> $company,
			'type'				=> $type,
			'subtype'			=> $subtype,
			'floor'				=> $floor,
			'building_area'		=> $area,
			'photo'				=> $photo_name,
			'address'			=> $address,
			'jalan'				=> $jalan,
			'kota'				=> $kota,
			'provinsi'			=> $provinsi,
			'latitude'			=> $lat,
			'longtitude'		=> $long,
			'building_status'	=> $status,
			'rent_period'		=> $period,
			'rent_cost'			=> $cost,
		];
		if ($data) {
			$this->model->save($data);
			$photo->move(ROOTPATH . 'public/image_site/', $photo_name);
			$url = $this->request->uri->getSegment(2);
			$message = 'Create Site';
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
			$message = 'Update Site';
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
			$message = 'Delete Site';
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
