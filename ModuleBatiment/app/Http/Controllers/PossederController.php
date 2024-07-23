<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Posseder;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;

class PossederController extends Controller
{
    public function store($id_sal, $id_equip)
    {
        $now = new DateTime();

        $possession = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_fin' => null]);
        
        try
        {
            $this->end_possession($possession);

            $possession2 = Posseder::create([
                'id_salle' => $id_sal,
                'id_equipement' => $id_equip,
                'date_debut' => $now,
            ]);
            
            if(is_null($possession2))
                return RequestReturns::NOT_EXIST;

            return RequestReturns::INSERT_SUCCESSFUL;        
        }
        catch(QueryException $e)
        {
            return RequestReturns::INSERT_FAILED;        
        }
    }

    public function create(Request $request)
    {
        $possession = $request->all();

        return $this->store($possession['id_salle'], $possession['id_equipement']);
    }
    
    public function show($id_sal, $id_equip, $date_debut)
    {
        $possession = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut])->first();
        
        if(is_null($possession))
            return RequestReturns::NOT_EXIST;

        return $possession;
    }

    public function index_show($id_sal, $id_equip)
    {
        $possessions = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip])->get();

        if(is_null($possessions))
            return RequestReturns::NOT_EXIST;

        return $possessions;
    }
    
    public function index()
    {
        $possessions = Posseder::all();

        return $possessions;
    }
        
    public function update($id_sal, $id_equip, $date_debut, $date_fin)
    {
        $possession = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut]);
        
        if(is_null($possession->first()))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $possession->update([
                'id_salle' => $id_sal,
                'id_equipement' => $id_equip,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_sal, $id_equip, $date_debut)
    {
        $possession = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut]);
        $possession2 = $possession->first();

        if(is_null($possession2))
            return RequestReturns::NOT_EXIST;

        $possession->delete();
        return $possession2;
    }

    public function truncate()
    {
        Posseder::truncate();
        // Posseder::query()->delete();

        return RequestReturns::DELETE_SUCCESSFUL;
    }

    //---------------------------------------------------------------------------------------------------

    public function end_possession($possession)
    {
        $now = new DateTime();
    
        $possession2 = $possession->first();
    
        if(!is_null($possession2))
            $possession->update([
                'id_salle' => $possession2->id_sal,
                'id_equipement' => $possession2->id_equip,
                'date_debut' => $possession2->date_debut,
                'date_fin' => $now,
            ]);
    }
}    

// $response = Http::withHeaders($headers)->{$request->method()}($url, $request->except(['_token_', '_method']));