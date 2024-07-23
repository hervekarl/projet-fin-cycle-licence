<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;

class NiveauController extends Controller
{
    public function store($num_etage, $nbre_salle, $id_bat)
    {
        $niveau = Niveau::create([
            'numero_etage' => $num_etage,
            'nbre_salle' => $nbre_salle,
            'id_batiment' => $id_bat
        ]);

        if(is_null($niveau))
            return RequestReturns::NOT_EXIST;

        return RequestReturns::INSERT_SUCCESSFUL;

    }

    public function create(Request $request)
    {
        $niveau = $request->all();

        return $this->store($niveau["numero_etage"], $niveau["nbre_salle"], $niveau["id_batiment"]);
    }

    public function show($id_niv)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return RequestReturns::NOT_EXIST;

        return $niveau;
    }
    
    public function index()
    {
        $niveaux = Niveau::all();

        $nivs;

        // foreach($niveaux as $niveau)
        // {
        //     array_push($niv, $niveau)
        // }

        return $niveaux;
    }

    public function batiment($id_niv)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return RequestReturns::NOT_EXIST;


        // dd($niveau->batiment);
        return $niveau->batiment;
    }

        
    public function update($id_niv, $num_etage, $nbre_salle, $id_bat)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return RequestReturns::NOT_EXIST;

        try
        {
            $niveau->update([
                'id_niveau' => $id_niv,
                'numero_etage' => $num_etage,
                'nbre_salle' => $nbre_salle,
                'id_batiment' => $id_bat
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_niv)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return RequestReturns::NOT_EXIST;

        try
        {
            $niveau->delete();

            return $niveau;
        }
        
        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }

    // public function truncate()
    // {
    //     Niveau::truncate();
    //     // Batiment::query()->delete();

    //     return "Table videe";
    // }
}
