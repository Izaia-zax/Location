<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table            = 'location';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_vehicule', 'id_clients', 'date_debut', 'date_fin'];

    protected $validationRules = [
        'id_vehicule' => 'required|integer',
        'id_clients'  => 'required|integer',
        'date_debut'  => 'required|valid_date[Y-m-d]',
        'date_fin'    => 'permit_empty|valid_date[Y-m-d]',
    ];

    protected $validationMessages = [
        'id_vehicule' => [
            'required' => 'Le véhicule est obligatoire.',
            'integer'  => 'Le véhicule doit être un entier valide.',
        ],
        'id_clients' => [
            'required' => 'Le client est obligatoire.',
            'integer'  => 'Le client doit être un entier valide.',
        ],
        'date_debut' => [
            'required'    => 'La date de début est obligatoire.',
            'valid_date'  => 'La date de début doit être au format YYYY-MM-DD.',
        ],
        'date_fin' => [
            'valid_date'  => 'La date de fin doit être au format YYYY-MM-DD.',
        ],
    ];
}