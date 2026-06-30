<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategorie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',    
                'auto_increment' => true,            
            ],

            'libelle' => [
                'type' => 'TEXT',  
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('categorie');
    }


    public function down()
    {
        $this->forge->dropTable('categorie');
    }
}
