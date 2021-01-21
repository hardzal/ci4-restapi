<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MataKuliah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' 		 	 => 'INT',
				'constraint' 	 => 5,
				'unsigned'   	 => true,
				'auto_increment' => true,
			],
			'kode' => [
				'type' 		 => 'CHAR',
				'constraint' => 10,
			],
			'name' => [
				'type' 			=> 'VARCHAR',
				'constraint' 	=> '100',
			],	
			'keterangan' => [
				'type' 		 => 'TEXT',
				'null'		 => true,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('mata_kuliah');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('mata_kuliah');
	}
}
