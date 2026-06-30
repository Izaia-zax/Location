<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculeModel extends Model
{
    protected $table            = 'vehicule';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['marque', 'modele', 'immatriculation', 'id_categorie'];

    protected $validationRules = [
        'marque'          => 'required|max_length[100]',
        'modele'          => 'required|max_length[100]',
        'immatriculation' => 'required|max_length[100]|is_unique[vehicule.immatriculation]',
        'id_categorie'    => 'required|integer',
    ];

    protected $validationMessages = [
        'marque' => [
            'required'   => 'La marque est obligatoire.',
            'max_length' => 'La marque ne peut pas dépasser 100 caractères.',
        ],
        'modele' => [
            'required'   => 'Le modèle est obligatoire.',
            'max_length' => 'Le modèle ne peut pas dépasser 100 caractères.',
        ],
        'immatriculation' => [
            'required'   => 'L\'immatriculation est obligatoire.',
            'max_length' => 'L\'immatriculation ne peut pas dépasser 100 caractères.',
            'is_unique'  => 'Cette immatriculation existe déjà.',
        ],
        'id_categorie' => [
            'required' => 'La catégorie est obligatoire.',
            'integer'  => 'La catégorie doit être un entier valide.',
        ],
    ];
}