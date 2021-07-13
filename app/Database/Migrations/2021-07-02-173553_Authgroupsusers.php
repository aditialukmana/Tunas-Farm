<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Authgroupsusers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'group_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'user_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'updated_by' => [
				'type'                  => 'BIGINT',
				'constraint'            => 20,
				'unsigned'              => TRUE,
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
			'deleted_at datetime',
		]);
		$this->forge->addKey(['id,group_id', 'user_id'], true);
		$this->forge->addForeignKey('group_id', 'auth_groups', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
		$this->forge->createTable('auth_groups_users', true);
	}

	public function down()
	{
		//
	}
}
