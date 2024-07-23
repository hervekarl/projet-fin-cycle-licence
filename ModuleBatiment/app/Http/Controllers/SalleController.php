<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;

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
            return RequestReturns::NOT_EXIST;

        return RequestReturns::INSERT_SUCCESSFUL;

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
            return RequestReturns::NOT_EXIST;

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
            return RequestReturns::NOT_EXIST;

        try
        {
            $salle = Salle::find($id_sal)->update([
                'id_salle' => $id_sal,
                'nom_salle' => $nom,
                'type_salle' => $type,
                'id_niveau' => $id_niv
            ]);
            
            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_sal)
    {
        $salle = Salle::find($id_sal);

        if(is_null($salle))
            return RequestReturns::NOT_EXIST;

        try
        {
            $salle->delete();

            return $salle;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }

    // public function truncate()
    // {
    //     Salle::truncate();
    //     // Salle::query()->delete();

    //     return "Table videe";
    // }
}
