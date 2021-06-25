<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contracts extends Migration
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
			'company' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'site' => [
				'type'              => 'VARCHAR',
				'constraint'        => '100',
			],
			'start_period' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'end_period' => [
				'type'              	=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'contract_document' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
				'null' 								=> FALSE,
			],
			'contract_commitment' => [
				'type'              	=> 'int',
				'null' 								=> FALSE,
			],
			'partnership_objective' => [
				'type'              	=> 'ENUM("building utilization", "additional income", "main income", "agriculture contribution")',
				'default' 						=> 'building utilization',
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
		$this->forge->createTable('contracts');
	}

	public function down()
	{
		//
	}
}
