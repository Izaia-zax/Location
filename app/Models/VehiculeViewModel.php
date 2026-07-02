<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculeViewModel extends Model
{
    protected $table            = 'vehicule_statut_view';
    protected $primaryKey       = 'vehicule_id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['vehicule_id', 'marque', 'modele', 'immatriculation','categorie','statut'];
}