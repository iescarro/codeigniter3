<?php
class Migration_Create_ci_sessions extends CI_Migration
{
	function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => FALSE,
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',
				'null' => FALSE,
			),
			'timestamp' => array(
				'type' => 'INT',
				'constraint' => '10',
				'unsigned' => TRUE,
				'null' => FALSE,
			),
			'data' => array(
				'type' => 'BLOB',
				'null' => FALSE,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('ci_sessions');
	}

	function down()
	{
		$this->dbforge->drop_table('ci_sessions');
	}
}
