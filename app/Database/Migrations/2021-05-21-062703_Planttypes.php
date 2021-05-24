<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Planttypes extends Migration
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
				'constraint'        => '10',
				'unique' 						=> TRUE,
			],
			'name' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'image' => [
				'type'              => 'VARCHAR',
				'constraint'        => '200',
			],
			'est_harvest_time' => [
				'type'              	=> 'INT',
			],
			'est_weight' => [
				'type'              	=> 'INT',
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
		$this->forge->createTable('planttypes');
	}

	public function down()
	{
		//
	}
}
