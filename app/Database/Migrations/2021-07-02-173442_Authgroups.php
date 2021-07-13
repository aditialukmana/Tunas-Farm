<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Authgroups extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'name'        => ['type' => 'varchar', 'constraint' => 255],
			'description' => ['type' => 'varchar', 'constraint' => 255],
			'updated_by' => [
				'type'                  => 'BIGINT',
				'constraint'            => 20,
				'unsigned'              => TRUE,
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
			'deleted_at datetime',
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('auth_groups');
	}

	public function down()
	{
		//
	}
}
