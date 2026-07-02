<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationViewModel extends Model
{
    protected $table            = 'location_encours_view';
    protected $primaryKey       = 'vehicule_id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['vehicule_id', 'marque', 'modele', 'immatriculation','categorie','client','date debut','date fin'];
}