<?php

namespace App\Http\Controllers;

use App\Models\Acheter;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DateTime;

class AcheterController extends Controller
{
    public function store($id_pat, $id_med, $quantite, $prix)
    {
        $now = new DateTime();
     
        try
        {
            $achat = Acheter::create([
                'id_patient' => $id_pat,
                'id_medicamment' => $id_med,
                'date_achat' => $now,
                'quantite' => $quantite,
                'prix_unitaire' => $prix,
            ]);
            
            if(is_null($achat))
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
        $achat = $request->all();

        return $this->store($achat['id_patient'], $achat['id_medicamment'], $achat['quantite'], $achat['prix_unitaire']);
    }
    
    public function show($id_pat, $id_med, $date)
    {
        $achat = Acheter::where(['id_patient' => $id_pat, 'id_medicamment' => $id_med, 'date_achat' => $date])->first();
        
        if(is_null($achat))
            return RequestReturns::NOT_EXIST;

        return $achat;
    }

    public function index_show($id_pat, $id_med)
    {
        $achats = Acheter::where(['id_patient' => $id_pat, 'id_medicamment' => $id_med])->get();

        if(is_null($achats))
            return RequestReturns::NOT_EXIST;

        return $achats;
    }
    
    public function index()
    {
        $achats = Acheter::all();

        return $achats;
    }
        
    public function update($id_pat, $id_med, $date, $quantite, $prix)
    {
        $achat = Acheter::where(['id_patient' => $id_pat, 'id_medicamment' => $id_med, 'date_achat' => $date]);
        
        if(is_null($achat->first()))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $achat->update([
                'id_patient' => $id_pat,
                'id_medicamment' => $id_med,
                'date_achat' => $date,
                'quantite' => $quantite,
                'prix_unitaire' => $prix,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_pat, $id_med, $date)
    {
        $achat = Acheter::where(['id_patient' => $id_pat, 'id_medicamment' => $id_med, 'date_achat' => $date]);

        $achat2 = $achat->first();
        
        if(is_null($achat2))
            return RequestReturns::NOT_EXIST;

        $achat->delete();

        return $achat2;
    }

    public function truncate()
    {
        Acheter::truncate();
        // Acheter::query()->delete();

        return RequestReturns::DELETE_SUCCESSFUL;    
    }
}
