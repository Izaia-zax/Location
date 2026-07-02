<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocationView extends Migration
{
    public function up()
    {
        $this->db->query("
                CREATE VIEW location_encours_view AS
                SELECT 
                    v.id as vehicule_id,
                    v.marque,
                    v.modele,
                    v.immatriculation,
                    c.libelle as categorie,
                    cl.nom as client,
                    l.date_debut,
                    l.date_fin
                FROM vehicule v
                JOIN location l ON l.id_vehicule = v.id
                JOIN categorie c ON c.id = v.id_categorie
                JOIN clients cl ON cl.id = l.id_clients
        ");
    }


    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS location_encours_view");
    }

    
}