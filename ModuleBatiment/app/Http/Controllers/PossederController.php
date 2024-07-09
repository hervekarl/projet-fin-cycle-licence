<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Posseder;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PossederController extends Controller
{
    public function store($id_sal, $id_equip)
    {
        $now = new DateTime();

        $posseder = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_fin' => null]);
        
        try
        {
            $this->end_possession($posseder);

            $posseder2 = Posseder::create([
                'id_salle' => $id_sal,
                'id_equipement' => $id_equip,
                'date_debut' => $now,
            ]);
            
            if(is_null($posseder2))
                return "";

            return "Ajout reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Ajout echouee
        }
    }

    public function create(Request $request)
    {
        $posseder = $request->all();

        $temp = [];

        foreach($posseder as $key => $value)
        {
            array_push($temp, $value);
        }

        return $this->store($temp[0], $temp[1]);
    }
    
    public function show($id_sal, $id_equip, $date_debut)
    {
        $posseder = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut])->first();
        
        if(is_null($posseder))
            return null;

        return $posseder;
    }

    public function index_show($id_sal, $id_equip)
    {
        $posseders = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip])->get();

        if(is_null($posseders))
            return null;

        return $posseders;
    }
    
    public function index()
    {
        $posseders = Posseder::all();

        return $posseders;
    }
        
    public function update($id_sal, $id_equip, $date_debut, $date_fin)
    {
        $posseder = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut]);
        
        if(is_null($posseder->first()))
            return null; //Enregistrement n'existe pas
    
        try
        {
            $posseder->update([
                'id_salle' => $id_sal,
                'id_equipement' => $id_equip,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function end_possession($posseder)
    {
        $now = new DateTime();

        $posseder2 = $posseder->first();

        if(!is_null($posseder2))
            $posseder->update([
                'id_salle' => $posseder2->id_sal,
                'id_equipement' => $posseder2->id_equip,
                'date_debut' => $posseder2->date_debut,
                'date_fin' => $now,
            ]);
    }

    public function destroy($id_sal, $id_equip, $date_debut)
    {
        $posseder = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut]);
        $posseder2 = $posseder->first();

        if(is_null($posseder2))
            return "null";

        $posseder->delete();

        return $posseder2;
    }

    public function truncate()
    {
        Posseder::truncate();
        // Posseder::query()->delete();

        return "Table videe";
    }
}

// $response = Http::withHeaders($headers)->{$request->method()}($url, $request->except(['_token_', '_method']));