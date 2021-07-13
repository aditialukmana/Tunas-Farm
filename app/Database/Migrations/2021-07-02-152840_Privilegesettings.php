<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Privilegesettings extends Migration
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
			'role' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'settings' => [
				'type'              => 'TEXT',
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
		$this->forge->createTable('privilegesettings');
	}

	public function down()
	{
		//
	}
}
