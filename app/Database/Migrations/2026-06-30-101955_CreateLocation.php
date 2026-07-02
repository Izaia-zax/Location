<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],

            'id_vehicule' => [
                'type' => 'INTEGER',
                'null' => false,
            ],

            'id_clients' => [
                'type' => 'INTEGER',
                'null' => false,
            ],

            'date_debut' => [
                'type' => 'DATE',
                'null' => false,
            ],

            'date_fin' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_vehicule', 'vehicule', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_clients', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('location');
    }

    public function down()
    {
        $this->forge->dropTable('location');
    }
}