<?php

namespace App\Controllers;

use App\Models\VehiculeModel;
use App\Models\ClientsModel;
use App\Models\StatutVehiculeModel;
use App\Models\CategorieModel;
use App\Models\LocationModel;
use App\Models\VehiculeViewModel;
use App\Models\HistoriqueStatutVehiculeModel;
use App\Models\LocationViewModel;

class ParcController extends BaseController
{

    protected $vehicule;
    protected $clients;
    protected $categorie;
    protected $location;
    protected $historique_statut;
    protected $location_encours;

    public function __construct()
    {   
        $this->vehicule = new VehiculeModel();
        $this->clients = new ClientsModel();
        $this->categorie = new CategorieModel();
        $this->location = new LocationModel();
        $this->historique_statut = new HistoriqueStatutVehiculeModel();
        $this->location_encours = new LocationViewModel();

    }

    public function index()
    {
        $model = new VehiculeViewModel;
        $vehicule_dispo = $model->where(['statut' => 'Disponible'])->findAll();
        return view('parc/index',[
            'vehicule' => $this->vehicule->findAll(),
            'clients' => $this->clients->findAll(),
            'vehicule_dispo' => $vehicule_dispo,
            'location_encours' => $this->location_encours->findAll(),
        ]);
    }

    public function save()
    {
        $data = [
            'id_vehicule' => $this->request->getPost('vehicule'),
            'id_clients' => $this->request->getPost('clients'),
            'date_debut' => $this->request->getPost('date_debut'),
            'date_fin' => $this->request->getPost('date_fin'),
        ];

        if(!$this->location->save($data))
        {
            return view('parc/index',['validation' => $this->location->errors(),'vehicule' => $this->vehicule->findAll(),'clients' => $this->clients->findAll()]);
        }

        $historique = [
            'id_vehicule' => $this->request->getPost('vehicule'), 
            'id_statut' => 2,
            'date_changement' => date('Y-m-d'),
        ];
        $this->historique_statut->save($historique);

        return redirect()->to('/parc');
    }

    
}
