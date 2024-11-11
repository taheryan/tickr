<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTickets extends Migration
{
    public function up()
    {
        // Create tickets table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'question'    => ['type' => 'TEXT'],
            'status'      => ['type' => 'ENUM', 'constraint' => ['open', 'pending', 'closed'], 'default' => 'open'],
            'created_at'  => ['type' => 'TIMESTAMP'],
            // 'updated_at'  => ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Assuming a users table exists
        $this->forge->createTable('tickets');

        // Create ticket_responses table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'ticket_id'   => ['type' => 'INT', 'constraint' => 11],
            'user_id'     => ['type' => 'INT', 'constraint' => 11], // User who is responding (could be support team or user)
            'answer'      => ['type' => 'TEXT'],
            'created_at'  => ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('ticket_id', 'tickets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Assuming user table exists for both ticket creator and responders
        $this->forge->createTable('ticket_responses');
    }

    public function down()
    {
        // Drop ticket_responses table
        $this->forge->dropTable('ticket_responses');
        // Drop tickets table
        $this->forge->dropTable('tickets');
    }
}
