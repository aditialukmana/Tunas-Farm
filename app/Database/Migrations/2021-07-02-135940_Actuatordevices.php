<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Actuatordevices extends Migration
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
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'floor' => [
				'type'              => 'INT',
			],
			'devices' => [
				'type'             		=> 'DATE',
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'airtemperature' => [
				'type'             		=> 'INT',
			],
			'humidity' => [
				'type'             		=> 'INT',
			],
			'acstart' => [
				'type'             		=> 'INT',
			],
			'acend' => [
				'type'             		=> 'INT',
			],
			'lightstart' => [
				'type'             		=> 'INT',
			],
			'lightend' => [
				'type'             		=> 'INT',
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
		$this->forge->createTable('actuatordevices');
	}

	public function down()
	{
		//
	}
}
