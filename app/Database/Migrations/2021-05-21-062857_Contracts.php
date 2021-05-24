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
			'startperiod' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'endperiod' => [
				'type'              	=> 'VARCHAR',
				'constraint'        	=> '100',
			],
			'contractdocument' => [
				'type'             		=> 'VARCHAR',
				'constraint'        	=> '100',
				'null' 								=> FALSE,
			],
			'contractcommitment' => [
				'type'              	=> 'int',
				'null' 								=> FALSE,
			],
			'partnershipobjective' => [
				'type'              	=> 'ENUM("Building Utilization", "Additional Income", "Main Income", "Agriculture Contribution")',
				'default' 						=> 'Building Utilization',
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
