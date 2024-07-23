<?php

namespace App\Http\Controllers;

use App\Models\Livrer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DateTime;

class LivrerController extends Controller
{
    public function store($id_fou, $id_med, $quantite, $montant)
    {
        $now = new DateTime();
     
        try
        {
            $livraison = Livrer::create([
                'id_fournisseur' => $id_fou,
                'id_medicamment' => $id_med,
                'date_livre' => $now,
                'quantite' => $quantite,
                'montant' => $montant,
            ]);
            
            if(is_null($livraison))
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
        $livraison = $request->all();

        return $this->store($livraison['id_fournisseur'], $livraison['id_medicamment'], $livraison['quantite'], $livraison['montant']);
    }
    
    public function show($id_fou, $id_med, $date)
    {
        $livraison = Livrer::where(['id_fournisseur' => $id_fou, 'id_medicamment' => $id_med, 'date_livre' => $date])->first();
        
        if(is_null($livraison))
            return RequestReturns::NOT_EXIST;

        return $livraison;
    }

    public function index_show($id_fou, $id_med)
    {
        $livraisons = Livrer::where(['id_fournisseur' => $id_fou, 'id_medicamment' => $id_med])->get();

        if(is_null($livraisons))
            return RequestReturns::NOT_EXIST;

        return $livraisons;
    }
    
    public function index()
    {
        $livraisons = Livrer::all();

        return $livraisons;
    }
        
    public function update($id_fou, $id_med, $date, $quantite, $montant)
    {
        $livraison = Livrer::where(['id_fournisseur' => $id_fou, 'id_medicamment' => $id_med, 'date_livre' => $date]);
        
        if(is_null($livraison->first()))
            return RequestReturns::NOT_EXIST;
    
        try
        {
            $livraison->update([
                'id_fournisseur' => $id_fou,
                'id_medicamment' => $id_med,
                'date_livre' => $date,
                'quantite' => $quantite,
                'montant' => $montant,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_fou, $id_med, $date)
    {
        $livraison = Livrer::where(['id_fournisseur' => $id_fou, 'id_medicamment' => $id_med, 'date_livre' => $date]);

        $livraison2 = $livraison->first();
        
        if(is_null($livraison2))
            return RequestReturns::NOT_EXIST;

        $livraison->delete();

        return $livraison2;
    }

    public function truncate()
    {
        Livrer::truncate();
        // Livrer::query()->delete();

        return RequestReturns::DELETE_SUCCESSFUL;    
    }
}
