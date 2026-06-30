<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriqueStatutVehiculeModel extends Model
{
    protected $table            = 'historique_statut_vehicule';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_vehicule', 'id_statut', 'date_changement'];

    protected $validationRules = [
        'id_vehicule'     => 'required|integer',
        'id_statut'       => 'required|integer',
        'date_changement' => 'required|valid_date[Y-m-d]',
    ];

    protected $validationMessages = [
        'id_vehicule' => [
            'required' => 'Le véhicule est obligatoire.',
            'integer'  => 'Le véhicule doit être un entier valide.',
        ],
        'id_statut' => [
            'required' => 'Le statut est obligatoire.',
            'integer'  => 'Le statut doit être un entier valide.',
        ],
        'date_changement' => [
            'required'   => 'La date de changement est obligatoire.',
            'valid_date' => 'La date de changement doit être au format YYYY-MM-DD.',
        ],
    ];
}