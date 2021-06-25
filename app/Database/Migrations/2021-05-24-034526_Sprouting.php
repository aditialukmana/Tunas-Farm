<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sprouting extends Migration
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
			'tipe_tanaman' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'benih' => [
				'type'              => 'INT',
			],
			'tanggal' => [
				'type'             		=> 'DATE',
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
		$this->forge->createTable('sprouting');
	}

	public function down()
	{
		//
	}
}
