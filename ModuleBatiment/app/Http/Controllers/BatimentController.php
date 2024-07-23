<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;

class BatimentController extends Controller
{
    public function store($nbre_niveau, $nom)
    {
        $batiment = Batiment::create([
            'nbre_niveau' => $nbre_niveau, 
            'nom_batiment' => $nom
        ]);

        if(is_null($batiment))
            return RequestReturns::NOT_EXIST;


        return RequestReturns::INSERT_SUCCESSFUL;
    }

    public function create(Request $request)
    {
        $batiment = $request->all();

        return $this->store($batiment["nbre_niveau"], $batiment["nom_batiment"]);
    }
    
    public function show($id_bat)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return RequestReturns::NOT_EXIST;

        return $batiment;
    }
    
    public function index()
    {
        $batiments = Batiment::all();

        return $batiments;
    }
        
    public function update($id_bat, $nbre_niveau, $nom)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return RequestReturns::NOT_EXIST;

        try
        {
            $batiment->update([
                'id_batiment' => $id_bat,
                'nbre_niveau' => $nbre_niveau, 
                'nom_batiment' => $nom
                ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_bat)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $batiment->delete();

            return $batiment;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }

    // public function truncate()
    // {
    //     Batiment::truncate();
    //     // Batiment::query()->delete();

    //     return "Table videe";
    // }
}
