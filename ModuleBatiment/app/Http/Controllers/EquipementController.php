<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EquipementController extends Controller
{
    public function store($nom, $type)
    {
        $equipement = Equipement::create([
            'nom_equipement' => $nom,
            'type_equipement' => $type,
        ]);

        if(is_null($equipement))
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $equipement = $request->all();

        $temp = [];

        foreach($equipement as $key => $value)
        {
            array_push($temp, $value);
        }

        return $this->store($temp[0], $temp[1]);
    }
    
    public function show($id_equip)
    {
        $equipement = Equipement::find($id_equip);

        if(is_null($equipement))
            return null;

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
            return null; //Enregistrement n'existe pas

        try
        {
            Equipement::find($id_equip)->update([
                'id_equipement' => $id_equip,
                'nom_equipement' => $nom,
                'type_equipement' => $type,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_equip)
    {
        $equipement = Equipement::find($id_equip);

        if(is_null($equipement))
            return null;

        try
        {
            $equipement->delete();

            return $equipement;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }
}
