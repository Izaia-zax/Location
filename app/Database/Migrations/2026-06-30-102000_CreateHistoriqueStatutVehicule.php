<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistoriqueStatutVehicule extends Migration
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

            'id_statut' => [
                'type' => 'INTEGER',
                'null' => false,
            ],

            'date_changement' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_vehicule', 'vehicule', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_statut', 'statut_vehicule', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('historique_statut_vehicule');
    }

    public function down()
    {
        $this->forge->dropTable('historique_statut_vehicule');
    }
}