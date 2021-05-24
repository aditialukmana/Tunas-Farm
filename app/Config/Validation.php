<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use Myth\Auth\Authentication\Passwords\ValidationRules;

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
		ValidationRules::class,
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
	public $plant_type_create    = [
		'code'     		 => 'required|alpha_numeric_space|min_length[4]|is_unique[planttypes.code]',
		'name'				 => 'required',
		'est_harvest_time'	=> 'required',
		'est_weight'		=> 'required'
	];

	public $plant_type_update    = [
		'code'     		 => 'required|alpha_numeric_space|min_length[4]',
		'name'				 => 'required',
		'image'				=> 'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
	];

	public $role_create    = [
		'code'     		 => 'required|min_length[3]|is_unique[roles.code]',
		'name'				 => 'required'
	];

	public $role_update    = [
		'code'     		 => 'required|min_length[3]',
		'name'				 => 'required'
	];

	public $customers_create    = [
		'name'				 => 'required',
		'address'			 => 'required',
		'phone'				 => 'required',
		'email'        		 => 'required|valid_email[customers.email]',
		'company'			 => 'required',
		'investment'		 => 'required',
	];

	public $customers_update    = [
		'name'				 => 'required',
		'address'			 => 'required',
		'phone'			 => 'required',
		'email'       		 => 'required|valid_email',
		'company'			 => 'required',
		'investment'		 => 'required',
	];

	public $contracts_create    = [
		'company'			 => 'required',
		'site'        		 => 'required',
		'startperiod'		 => 'required',
		'endperiod'		 	 => 'required',
		'contractdocument'	 => 'required',
		'contractcommitment' => 'required',
		'partnershipobjective' => 'required',
	];

	public $contracts_update    = [
		'company'			 => 'required',
		'site'        		 => 'required',
		'startperiod'		 => 'required',
		'endperiod'		 	 => 'required',
		'contractdocument'	 => 'required',
		'contractcommitment' => 'required',
		'partnershipobjective' => 'required',
	];

	public $company_create    = [
		'prefix_code'			=> 'required',
		'name'					=> 'required',
		'address'				=> 'required',
		'phone'					=> 'required',
		'email'        		 	=> 'required|valid_email[company.email]',
	];

	public $company_update    = [
		'prefix_code'			=> 'required',
		'name'					=> 'required',
		'address'				=> 'required',
		'phone'					=> 'required',
		'email'        		 	=> 'required|valid_email[company.email]',
	];

	public $site_create = [
		'code'			=> 'required',
		'name'			=> 'required',
		'company'			=> 'required',
		'type'			=> 'required',
		'subtype'			=> 'required',
		'photo'			=> 'required',
		'address'			=> 'required',
		'jalan'			=> 'required',
		'kota'			=> 'required',
		'provinsi'			=> 'required',
		'building_status'			=> 'required',

	];
}
