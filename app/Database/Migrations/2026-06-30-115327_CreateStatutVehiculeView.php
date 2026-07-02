<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStatutVehiculeView extends Migration
{
    public function up()
    {
        $this->db->query("
                CREATE VIEW vehicule_statut_view AS
                SELECT 
                    v.id as vehicule_id,
                    v.marque,
                    v.modele,
                    v.immatriculation,
                    c.libelle as categorie,
                    s.libelle as statut
                FROM vehicule v
                JOIN historique_statut_vehicule h ON h.id_vehicule = v.id
                JOIN categorie c ON c.id = v.id_categorie
                JOIN statut_vehicule s ON s.id = h.id_statut
                WHERE h.id = (
                    SELECT h2.id
                    FROM historique_statut_vehicule h2
                    WHERE h2.id_vehicule = v.id
                   ORDER BY h2.date_changement DESC, h2.id DESC
                    LIMIT 1
                )
        ");
    }


    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS vehicule_statut_view");
    }

    
}