<?php
class Migration_Create_jobs extends CI_Migration
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
			'job' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'payload' => array(
				'type' => 'text',
				'null' => TRUE,
			),
			'created_at' => array(
				'type' => 'datetime',
				'null' => TRUE,
			),
			'available_at' => array(
				'type' => 'datetime',
				'null' => TRUE,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('jobs');
	}

	function down()
	{
		$this->dbforge->drop_table('jobs');
	}
}
