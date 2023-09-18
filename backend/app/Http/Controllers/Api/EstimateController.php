<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    public function index()
    {
        return Estimate::all();
    }

    public function store(Request $request)
    {
        $estimate = Estimate::create($request->all());
        return $estimate;
    }

    public function show(Estimate $estimate)
    {
        $estimate->lines;
        return $estimate;
    }

    public function update(Request $request, Estimate $estimate)
    {
        return ['name' => "Mise à jour d'une estimation"];
    }

    public function destroy(Estimate $estimate)
    {
        return ['name' => "Suppression d'une estimation"];
    }
}
