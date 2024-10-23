<?php
class Migration_Create_users extends CI_Migration
{
	function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'email' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'password' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'token' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'created_at' => array(
				'type' => 'datetime',
				'null' => TRUE,
			),
			'updated_at' => array(
				'type' => 'datetime',
				'null' => TRUE,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	function down()
	{
		$this->dbforge->drop_table('users');
	}
}
