<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistoriqueTarif extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',    
                'auto_increment' => true,            
            ],

            'id_categorie' => [
                'type' => 'INTEGER',  
                'null' => false,
            ],

            'tarif' => [
                'type' => 'REAL',  
                'null' => false,
            ],

            'date_debut' => [
                'type' => 'TEXT',
                'null' => false,
            ],

            'date_fin' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->createTable('historique_tarif');

    }


    public function down()
    {
        $this->forge->dropTable('historique_tarif');
    }
}
