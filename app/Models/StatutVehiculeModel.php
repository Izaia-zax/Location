<?php

namespace App\Models;

use CodeIgniter\Model;

class StatutVehiculeModel extends Model
{
    protected $table            = 'statut_vehicule';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['libelle'];

    protected $validationRules = [
        'libelle' => 'required|max_length[100]|is_unique[statut_vehicule.libelle]',
    ];

    protected $validationMessages = [
        'libelle' => [
            'required'   => 'Le libellé du statut est obligatoire.',
            'max_length' => 'Le libellé ne peut pas dépasser 100 caractères.',
            'is_unique'  => 'Ce statut existe déjà.',
        ],
    ];
}