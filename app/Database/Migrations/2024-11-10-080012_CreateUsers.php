<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'username'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'password'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'=> ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
