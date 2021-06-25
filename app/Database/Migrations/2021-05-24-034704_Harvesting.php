<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Harvesting extends Migration
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
			'transplanting' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			
			'tanggal' => [
				'type'             		=> 'DATE',
			],
			'terproses' => [
				'type'              => 'BIGINT',
				'constraint'        => 20,
			],
			'sisa' => [
				'type'              => 'BIGINT',
				'constraint'        => 20,
			],
			'status' => [
				'type'              	=> 'ENUM("active", "inactive")',
				'default' 				=> 'inactive',
				'null' 					=> FALSE,
			],
			'id_tanaman' => [
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
		$this->forge->createTable('harvesting');
	}

	public function down()
	{
		//
	}
}
