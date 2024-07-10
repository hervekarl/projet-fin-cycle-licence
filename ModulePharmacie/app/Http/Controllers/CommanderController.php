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
        $commande = $request->all();

        return $this->store($commande['id_employe'], $commande['id_medicamment'], $commande['quantite']);
    }
    
    public function show($id_emp, $id_med, $date)
    {
        $commande = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med, 'date_command' => $date])->first();
        
        if(is_null($commande))
            return null;

        return $commande;
    }

    public function index_show($id_emp, $id_med)
    {
        $commandes = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med])->get();

        if(is_null($commandes))
            return null;

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
            return null; //Enregistrement n'existe pas
    
        try
        {
            $commande->update([
                'id_employe' => $id_emp,
                'id_medicamment' => $id_med,
                'date_command' => $date,
                'quantite' => $quantite,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_emp, $id_med, $date)
    {
        $commande = Commander::where(['id_employe' => $id_emp, 'id_medicamment' => $id_med, 'date_command' => $date]);

        $commade2 = $commande->first();
        
        if(is_null($commande2))
            return null;

        $commande->delete();

        return $commande2;
    }

    public function truncate()
    {
        Commander::truncate();
        // Commander::query()->delete();

        return "Table videe";
    }
}
