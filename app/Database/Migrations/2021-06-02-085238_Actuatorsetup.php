<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Actuatorsetup extends Migration
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
			'site' => [
				'type'              => 'VARCHAR',
				'constraint'        => '100',
			],
			'floor' => [
				'type'              => 'int',
			],
			'device' => [
				'type'              => 'VARCHAR',
				'constraint'		=> '100',

			],
			'water' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'air' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'humidity' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'tds' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'ph' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'ac_start_time' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'ac_end_time' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'light_start_time' => [
				'type'              => 'int',
				'null' 								=> FALSE,
			],
			'light_end_time' => [
				'type'              => 'int',
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
		$this->forge->createTable('actuator');
	}

	public function down()
	{
		//
	}
}
