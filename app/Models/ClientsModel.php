<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientsModel extends Model
{
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'email', 'numero'];

    protected $validationRules = [
        'nom'    => 'required|max_length[100]',
        'email'  => 'required|max_length[100]|valid_email|is_unique[clients.email]',
        'numero' => 'required|max_length[100]|is_unique[clients.numero]',
    ];

    protected $validationMessages = [
        'nom' => [
            'required'   => 'Le nom est obligatoire.',
            'max_length' => 'Le nom ne peut pas dépasser 100 caractères.',
        ],
        'email' => [
            'required'    => 'L\'email est obligatoire.',
            'max_length'  => 'L\'email ne peut pas dépasser 100 caractères.',
            'valid_email' => 'L\'email doit être une adresse email valide.',
            'is_unique'   => 'Cet email est déjà utilisé.',
        ],
        'numero' => [
            'required'   => 'Le numéro est obligatoire.',
            'max_length' => 'Le numéro ne peut pas dépasser 100 caractères.',
            'is_unique'  => 'Ce numéro est déjà utilisé.',
        ],
    ];
}