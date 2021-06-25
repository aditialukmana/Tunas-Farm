<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration
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
			'name' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'address' => [
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
			'investment' => [
				'type'              	=> 'ENUM("conservative", "moderate", "aggresive")',
				'default' 						=> 'conservative',
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
		$this->forge->createTable('customers');
	}

	public function down()
	{
		//
	}
}
