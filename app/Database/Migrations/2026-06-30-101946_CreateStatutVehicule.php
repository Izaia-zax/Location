<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStatutVehicule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],

            'libelle' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('statut_vehicule');
    }

    public function down()
    {
        $this->forge->dropTable('statut_vehicule');
    }
}