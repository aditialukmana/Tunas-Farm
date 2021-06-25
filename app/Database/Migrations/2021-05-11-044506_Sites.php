<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sites extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'              => 'BIGINT',
				'constraint'        => 20,
				'unsigned'          => TRUE,
				'auto_increment'    => TRUE
			],
			'code' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'name' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'company' => [
				'type'              => 'VARCHAR',
				'constraint'        => '200',
			],
			'type' => [
				'type'             		=> 'ENUM("indoor", "outdoor")',
				'default' 						=> 'indoor',
				'null' 								=> FALSE,
			],
			'subtype' => [
				'type'             		=> 'ENUM("warehouse", "shophouse", "open space")',
				'default' 						=> 'warehouse',
				'null' 								=> FALSE,
			],
			'floor' => [
				'type'              	=> 'INT',

			],
			'building_area' => [
				'type'             		=> 'ENUM("70 m2 - 100 m2", "100 m2 - 500 m2", "500 m2 - 1000 m2", ">1000 m2")',
				'default' 						=> '70 m2 - 100 m2',
				'null' 								=> FALSE,
			],
			'photo' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'address' => [
				'type'             		=> 'TEXT',
			],
			'jalan' => [
				'type'             		=> 'TEXT',
			],
			'kota' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'provinsi' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'latitude' => [
				'type'             		=> 'VARCHAR',
				'constraint'				=> '100',
			],
			'longtitude' => [
				'type'             		=> 'VARCHAR',
				'constraint'				=> '100',
			],
			'building_status' => [
				'type'             		=> 'ENUM("owned","rent")',
				'default' 						=> 'owned',
				'null' 								=> FALSE,
			],
			'rent_period' => [
				'type'             		=> 'INT',
			],
			'rent_cost' => [
				'type'             		=> 'INT',
			],
			'created_by' => [
				'type'              	=> 'BIGINT',
				'constraint'        	=> 20,
				'unsigned'          	=> TRUE,
			],
			'updated_by' => [
				'type'              	=> 'BIGINT',
				'constraint'        	=> 20,
				'unsigned'          	=> TRUE,
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
			'deleted_at datetime',
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('sites');
	}

	public function down()
	{
		//
	}
}
