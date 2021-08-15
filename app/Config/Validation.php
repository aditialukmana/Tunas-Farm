<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $user_create    = [
		'username'    		=> 'required|is_unique[users.username]',
		'email'        		=> 'required|valid_email|is_unique[users.email]',
		'fullname'			=> 'required',
		'password_hash'    	=> 'required',
	];

	// public $user_update    = [
	// 	'username'     		=> 'required|alpha_numeric_space|min_length[3]',
	// 	'email'        		=> 'required|valid_email',
	// 	'phone'				=> 'required|min_length[11]',
	// 	'password'     		=> 'required|min_length[8]',
	// ];

	public $plant_type_create    = [
		'name'				=> 'required',
		'image'				=> 'uploaded[image]|max_size[image,2048]|is_image[image]',
		'est_harvest_time'	=> 'required',
		'est_weight'		=> 'required',
	];

	public $customers_create    = [
		'name'				=> 'required',
		'address'			=> 'required',
		'phone'				=> 'required|is_unique[customers.phone]',
		'email'        		=> 'required|valid_email[customers.email]',
		'investment'		=> 'required',
	];

	public $customers_update    = [
		'name'				=> 'required',
		'address'			=> 'required',
		'phone'			 	=> 'required|min_length[11]',
		'email'       		=> 'required|valid_email',
		'investment'		=> 'required',
	];

	public $contracts_create    = [
		'company'				=> 'required',
		'site'        			=> 'required',
		'start_period'			=> 'required',
		'end_period'			=> 'required',
		'contract_document'		=> 'uploaded[contract_document]|max_size[contract_document,2048]|mime_in[contract_document,application/pdf,application/zip,application/msword,application/rar',
		'contract_commitment'	=> 'required',
		'partnership_objective' => 'required',
	];

	public $contracts_update    = [
		'company'				=> 'required',
		'site'        			=> 'required',
		'start_period'		 	=> 'required',
		'end_period'		 	=> 'required',
		'contract_commitment' 	=> 'required',
		'partnership_objective' => 'required',
	];

	public $company_create    = [
		'prefix_code'		 	=> 'required',
		'name'				 	=> 'required',
		'address'			 	=> 'required',
		'customer'				=> 'required',
		'phone'			 	 	=> 'required|min_length[11]|is_unique[company.phone]',
		'email'        		 	=> 'required|valid_email|is_unique[company.email]',
	];

	public $company_update    = [
		'prefix_code'			=> 'required',
		'name'					=> 'required',
		'address'				=> 'required',
		'customer'				=> 'required',
		'phone'					=> 'required|min_length[11]',
		'email'       	 		=> 'required|valid_email',
	];

	public $site_create = [
		'code'				=> 'required',
		'name'				=> 'required',
		'company'			=> 'required',
		'type'				=> 'required',
		'subtype'			=> 'required',
		'photo'				=> 'required|uploaded[photo]|max_size[photo,2048]|ext_in[photo,png,jpg,gif]|is_image[photo]',
		'address'			=> 'required',
		'jalan'				=> 'required',
		'kota'				=> 'required',
		'provinsi'			=> 'required',
		'latitude'			=> 'required',
		'longtitude'		=> 'required',
		'building_status'	=> 'required',

	];


	public $site_update = [
		'name'				=> 'required',
		'company'			=> 'required',
		'type'				=> 'required',
		'subtype'			=> 'required',
		'photo'				=> 'required',
		'photo'				=> 'required|uploaded[photo]|max_size[photo,2048]|ext_in[photo,png,jpg,gif]|is_image[photo]',
		'address'			=> 'required',
		'jalan'				=> 'required',
		'kota'				=> 'required',
		'provinsi'			=> 'required',
		'latitude'			=> 'required',
		'longtitude'		=> 'required',
		'building_status'	=> 'required',
	];

	public $device_create = [];

	public $device_update = [];

	public $grow_create = [
		'customer'			=> 'required',
		'type'				=> 'required',
		'status'			=> 'required',
	];

	public $grow_update = [
		'customer'			=> 'required',
		'type'				=> 'required',
		'status'			=> 'required',
	];

	public $sprouting_create = [
		'code'				=> 'required',
		'tipe_tanaman'		=> 'required',
		'benih'				=> 'required',
		'tanggal'			=> 'required',
		'status'			=> 'required',
		'id_tanaman'		=> 'required'
	];

	// public $sprouting_update = [
	// 	'tipe_tanaman'		=> 'required',
	// 	'benih'				=> 'required',
	// 	'status'			=> 'required',
	// ];

	public $seedling_create = [
		'code'				=> 'required',
		'sprouting'			=> 'required',
		'seedling'			=> 'required',
		'tanggal'			=> 'required',
		'status'			=> 'required',
		'id_tanaman'		=> 'required'
	];

	public $seedling_update = [
		'sprouting'			=> 'required',
		'seedling'			=> 'required',
		'status'			=> 'required',
	];

	public $grooming_create = [
		'code'				=> 'required',
		'seedling'			=> 'required',
		'tower_level'		=> 'required',
		'tanggal'			=> 'required',
		'status'			=> 'required',
		'id_tanaman'		=> 'required'
	];

	public $transplanting_create = [
		'code'				=> 'required',
		'grooming'			=> 'required',
		'tower_level'		=> 'required',
		'tanggal'			=> 'required',
		'status'			=> 'required',
		'id_tanaman'		=> 'required'
	];

	public $harvesting_create = [
		'code'				=> 'required',
		'transplanting'		=> 'required',
		'tanggal'			=> 'required',
		'status'			=> 'required',
		'id_tanaman'		=> 'required'
	];
}
