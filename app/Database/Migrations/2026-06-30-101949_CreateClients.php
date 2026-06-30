<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],

            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],

            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}