<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SalleController extends Controller
{
    public function store($nom, $type, $id_niv)
    {
        $salle = Salle::create([
            'nom_salle' => $nom,
            'type_salle' => $type,
            'id_niveau' => $id_niv
        ]);

        if(is_null($salle))
            return "";

        return "Ajout reussit";

    }

    public function create(Request $request)
    {
        $salle = $request->all();

        return $this->store($salle["nom_salle"], $salle["type_salle"], $salle["id_niveau"]);
    }
    
    public function show($id_sal)
    {
        $salle = Salle::find($id_sal);

        if(is_null($salle))
            return null;

        return $salle;
    }
    
    public function index()
    {
        $salles = Salle::all();

        return $salles;
    }
        
    public function update($id_sal, $nom, $type, $id_niv)
    {
        $salle = Salle::find($id_sal);

        if(is_null($salle))
            return null; //Enregistrement n'existe pas

        try
        {
            $salle = Salle::find($id_sal)->update([
                'id_salle' => $id_sal,
                'nom_salle' => $nom,
                'type_salle' => $type,
                'id_niveau' => $id_niv
            ]);
            
            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_sal)
    {
        $salle = Salle::find($id_sal);

        if(is_null($salle))
            return null;

        try
        {
            $salle->delete();

            return $salle;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }

    // public function truncate()
    // {
    //     Salle::truncate();
    //     // Salle::query()->delete();

    //     return "Table videe";
    // }
}
