<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EstimateField;
use Illuminate\Http\Request;

class EstimateFieldController extends Controller
{
    public function index()
    {   
        $fields = EstimateField::with('presetValues')->get();

        return $fields;
    }

    public function store(Request $request)
    {
        return ['name' => "Création d'un champ"];
    }

    public function show(EstimateField $field)
    {
        return ['name' => "Détail d'un champ", 'field' => $field];
    }

    public function update(Request $request, EstimateField $field)
    {
        return ['name' => "Mise à jour d'un champ"];
    }

    public function destroy(EstimateField $field)
    {
        return ['name' => "Suppression d'un champ"];
    }
}
