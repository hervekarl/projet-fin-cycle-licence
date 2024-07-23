<?php

namespace App\Http\Controllers;

use App\Models\Commander;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DateTime;

class CommanderController extends Controller
{
    public function store($id_emp, $id_med, $quantite)
    {
        $now = new DateTime();
     
        try
        {
            $commande = Commander::create([
                'id_employe' => $id_emp,
                'id_medicamment' => $id_med,
                'date_command' => $now,
                'quantite' => $quantite,
            ]);
            
            if(is_null($commande))
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
        $commande = $request->all();

        return $this->store($commande['id_employe'], $commande['id_medicamment'], $commande['quantite']);
    }
    
    public function show($id_emp, $id_med, $date)
    {
        $commande = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med, 'date_command' => $date])->first();
        
        if(is_null($commande))
            return RequestReturns::NOT_EXIST;

        return $commande;
    }

    public function index_show($id_emp, $id_med)
    {
        $commandes = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med])->get();

        if(is_null($commandes))
            return RequestReturns::NOT_EXIST;

        return $commandes;
    }
    
    public function index()
    {
        $commandes = Commander::all();

        return $commandes;
    }
        
    public function update($id_emp, $id_med, $date, $quantite)
    {
        $commande = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med, 'date_command' => $date]);
        
        if(is_null($commande->first()))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $commande->update([
                'id_employe' => $id_emp,
                'id_medicamment' => $id_med,
                'date_command' => $date,
                'quantite' => $quantite,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_emp, $id_med, $date)
    {
        $commande = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med, 'date_command' => $date]);

        $commade2 = $commande->first();
        
        if(is_null($commande2))
            return RequestReturns::NOT_EXIST;

        $commande->delete();

        return $commande2;
    }

    public function truncate()
    {
        Commander::truncate();
        // Commander::query()->delete();

        return RequestReturns::DELETE_SUCCESSFUL;
    }
}
