<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;


class EquipementController extends Controller
{
    public function store($nom, $type)
    {
        $equipement = Equipement::create([
            'nom_equipement' => $nom,
            'type_equipement' => $type,
        ]);

        if(is_null($equipement))
            return RequestReturns::NOT_EXIST;

        return RequestReturns::INSERT_SUCCESSFUL;    }

    public function create(Request $request)
    {
        $equipement = $request->all();

        return $this->store($equipement["nom_equipement"], $equipement["type_equipement"]);
    }
    
    public function show($id_equip)
    {
        $equipement = Equipement::find($id_equip);

        if(is_null($equipement))
            return RequestReturns::NOT_EXIST;

        return $equipement;
    }

    public function index()
    {
        $equipements = Equipement::all();

        return $equipements;
    }
        
    public function update($id_equip, $nom, $type)
    {
        $equipement = Equipement::find($id_equip);

        if(is_null($equipement))
            return RequestReturns::NOT_EXIST;

        try
        {
            Equipement::find($id_equip)->update([
                'id_equipement' => $id_equip,
                'nom_equipement' => $nom,
                'type_equipement' => $type,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_equip)
    {
        $equipement = Equipement::find($id_equip);

        if(is_null($equipement))
            return RequestReturns::NOT_EXIST;

        try
        {
            $equipement->delete();

            return $equipement;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }
}
