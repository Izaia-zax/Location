<?php

namespace App\Validation;

use App\Models\VehiculeViewModel;

class CustomValidation
{
    public function date_after(string $dateFin, string $field, array $data): bool
    {
        if (empty($dateFin) || empty($data[$field])) {
            return true;
        }

        return strtotime($dateFin) > strtotime($data[$field]);
    }

    public function dispo(string $vehicule): bool
    {
        $model = new VehiculeViewModel();
        $result = $model->where(['statut' => 'Disponible'])->find($vehicule);

        if(!$result)
        {   
            return false;
        }
        return true;
    }
}