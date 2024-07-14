<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Occuper;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
        $occupation = $request->all();

        return $this->store($occupation['id_salle'], $occupation['id_patient']);
    }
    
    public function show($id_sal, $id_pat, $date_debut)
    {
        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_debut' => $date_debut])->first();
        
        if(is_null($occupation))
            return null;

        return $occupation;
    }

    public function index_show($id_sal, $id_pat)
    {
        $occupations = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat])->get();

        if(is_null($occupations))
            return null;

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
            return null; //Enregistrement n'existe pas
    
        try
        {
            $occupation->update([
                'id_salle' => $id_sal,
                'id_patient' => $id_pat,
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
    }

    public function destroy($id_sal, $id_pat, $date_debut)
    {
        $occupation = Occuper::where(['id_salle' => $id_sal, 'id_patient' => $id_pat, 'date_debut' => $date_debut]);
        $occupation2 = $occupation->first();

        if(is_null($occupation2))
            return "null";

        $occupation->delete();

        return $occupation2;
    }

    public function truncate()
    {
        Occuper::truncate();
        // Occuper::query()->delete();

        return "Table videe";
    }
}

// $response = Http::withHeaders($headers)->{$request->method()}($url, $request->except(['_token_', '_method']));