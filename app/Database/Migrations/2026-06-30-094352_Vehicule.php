<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vehicule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],

            'marque' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
                ],

            'modele' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],

            'immatriculation' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
                'unique' => true,
            ],

            'id_categorie' => [
                'type' => 'INTEGER',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->addForeignKey
        (
            'id_categorie',
            'categorie',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('vehicule');
    }

    public function down()
    {
        $this->forge->dropTable('vehicule');
    }
}
