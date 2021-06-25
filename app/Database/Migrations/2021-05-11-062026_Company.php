<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Company extends Migration
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
			'prefix_code' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'name' => [
				'type'              => 'VARCHAR',
				'constraint'        => '200',
			],
			'address' => [
				'type'             		=> 'TEXT',

			],
			'customer' => [
				'type'              => 'VARCHAR',
				'constraint'        => '200',
			],
			'phone' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'email' => [
				'type'              	=> 'VARCHAR',
				'constraint'        	=> '100',
				'unique'							=> true,
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
		$this->forge->createTable('company');
	}

	public function down()
	{
		//
	}
}
