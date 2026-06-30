<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriqueTarifModel extends Model
{
    protected $table            = 'historique_tarif';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_categorie', 'tarif', 'date_debut', 'date_fin'];

    protected $validationRules = [
        'id_categorie' => 'required|integer',
        'tarif'        => 'required|numeric',
        'date_debut'   => 'required|valid_date[Y-m-d]',
        'date_fin'     => 'permit_empty|valid_date[Y-m-d]',
    ];

    protected $validationMessages = [
        'id_categorie' => [
            'required' => 'La catégorie est obligatoire.',
            'integer'  => 'La catégorie doit être un entier valide.',
        ],
        'tarif' => [
            'required' => 'Le tarif est obligatoire.',
            'numeric'  => 'Le tarif doit être un nombre valide.',
        ],
        'date_debut' => [
            'required'   => 'La date de début est obligatoire.',
            'valid_date' => 'La date de début doit être au format YYYY-MM-DD.',
        ],
        'date_fin' => [
            'valid_date' => 'La date de fin doit être au format YYYY-MM-DD.',
        ],
    ];
}