<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Occuper;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RequestReturns;

class OccuperController extends Controller
{
    public function store($id_sal, $id_pat)
    {
        $now = new DateTime();

        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_fin' => null]);
        
        try
        {
            $this->end_occupation($occupation);

            $occupation2 = Occuper::create([
                'id_salle' => $id_sal,
                'id_patient' => $id_pat,
                'date_debut' => $now,
            ]);
            
            if(is_null($occupation2))
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
        $occupation = $request->all();

        return $this->store($occupation['id_salle'], $occupation['id_patient']);
    }
    
    public function show($id_sal, $id_pat, $date_debut)
    {
        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_debut' => $date_debut])->first();
        
        if(is_null($occupation))
            return RequestReturns::NOT_EXIST;

        return $possession;
    }

    public function index_show($id_sal, $id_pat)
    {
        $occupations = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat])->get();

        if(is_null($occupations))
            return RequestReturns::NOT_EXIST;

        return $occupations;
    }
    
    public function index()
    {
        $occupations = Occuper::all();

        return $occupations;
    }
        
    public function update($id_sal, $id_pat, $date_debut, $date_fin)
    {
        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_debut' => $date_debut]);
        
        if(is_null($occupation->first()))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $occupation->update([
                'id_salle' => $id_sal,
                'id_patient' => $id_pat,
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

    
    public function destroy($id_sal, $id_pat, $date_debut)
    {
        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_debut' => $date_debut]);
        $occupation2 = $occupation->first();

        if(is_null($occupation2))
        return RequestReturns::NOT_EXIST;

    $occupation->delete();
    }
    
    
    public function truncate()
    {
        Occuper::truncate();
        // Occuper::query()->delete();

        return RequestReturns::DELETE_SUCCESSFUL;
    }

    //--------------------------------------------------------------------------------------------------------

    public function end_occupation($occupation)
    {
        $now = new DateTime();
    
        $occupation2 = $occupation->first();
    
        if(!is_null($occupation2))
            $occupation->update([
                'id_salle' => $occupation2->id_sal,
                'id_patient' => $occupation2->id_pat,
                'date_debut' => $occupation2->date_debut,
                'date_fin' => $now,
            ]);

            return $occupation2;
    }
}

// $response = Http::withHeaders($headers)->{$request->method()}($url, $request->except(['_token_', '_method']));