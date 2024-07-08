<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BatimentController extends Controller
{
    public function store($nbre_niveau)
    {
        $batiment = Batiment::create([
            'nbre_niveau' => $nbre_niveau
        ]);

        if(is_null($batiment))
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $batiment = $request->all();

        return $this->store($batiment["nbre_niveau"]);
    }
    
    public function show($id_bat)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return null;

        return $batiment;
    }
    
    public function index()
    {
        $batiments = Batiment::all();

        return $batiments;
    }
        
    public function update($id_bat, $nbre_niveau)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return null; //Enregistrement n'existe pas

        try
        {
            $batiment->update([
                'id_batiment' => $id_bat,
                'nbre_niveau' => $nbre_niveau
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_bat)
    {
        $batiment = Batiment::find($id_bat);

        if(is_null($batiment))
            return null;

        try
        {
            $batiment->delete();

            return $batiment;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }

    // public function truncate()
    // {
    //     Batiment::truncate();
    //     // Batiment::query()->delete();

    //     return "Table videe";
    // }
}
