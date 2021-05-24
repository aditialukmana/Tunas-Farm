<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Growsinstallations extends Migration
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
				'type'              => 'VARCHAR',
				'constraint'        => '100',
				'null' 								=> FALSE,
			],
			'type' => [
				'type'              	=> 'ENUM("Tower", "Grow Bed", "Home Kit")',
				'default' 						=> 'Tower',
				'null' 								=> FALSE,
			],
			'level_count' => [
				'type'              => 'int',

			],
			'levelhole' => [
				'type'              => 'int',

			],
			'hole' => [
				'type'              => 'int',
			],
			'site' => [
				'type'              => 'VARCHAR',
				'constraint'        => '100',
			],
			'floor' => [
				'type'              => 'int',
			],
			
			'status' => [
				'type'              	=> 'ENUM("Active", "Inactive")',
				'default' 						=> 'Active',
				'null' 								=> FALSE,
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
		$this->forge->createTable('grow_installations');
	}

	public function down()
	{
		//
	}
}
