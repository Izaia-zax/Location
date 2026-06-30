<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table            = 'categorie';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['libelle'];

    protected $validationRules = [
        'libelle' => 'required|max_length[100]|is_unique[categorie.libelle]',
    ];

    protected $validationMessages = [
        'libelle' => [
            'required'   => 'Le libellé est obligatoire.',
            'max_length' => 'Le libellé ne peut pas dépasser 100 caractères.',
            'is_unique'  => 'Cette catégorie existe déjà.',
        ],
    ];
}