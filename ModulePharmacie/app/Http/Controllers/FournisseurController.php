<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class FournisseurController extends Controller
{
    public function store($nom, $tel, $adresse)
    {
        $fournisseur = Fournisseur::create([
            'nom_fournisseur' => $nom,
            'tel_fournisseur' => $tel,
            'adresse_fournisseur' => $adresse,
        ]);

        if(is_null($fournisseur))
            return RequestReturns::NOT_EXIST;

        return RequestReturns::INSERT_SUCCESSFUL;    }

    public function create(Request $request)
    {
        $fournisseur = $request->all();

        return $this->store($fournisseur["nom_fournisseur"], $fournisseur["tel_fournisseur"], $fournisseur["adresse_fournisseur"]);
    }
    
    public function show($id_fou)
    {
        $fournisseur = Fournisseur::find($id_fou);

        if(is_null($fournisseur))
            return RequestReturns::NOT_EXIST;

        return $fournisseur;
    }
    
    public function index()
    {
        $fournisseurs = Fournisseur::all();

        return $fournisseurs;
    }
        
    public function update($id_fou, $nom, $tel, $adresse)
    {
        $fournisseur = Fournisseur::find($id_fou);

        if(is_null($fournisseur))
            return RequestReturns::NOT_EXIST;

        try
        {
            $fournisseur->update([
                'id_fournisseur' => $id_fou,
                'nom_fournisseur' => $nom,
                'tel_fournisseur' => $tel,
                'adresse_fournisseur' => $adresse,
            ]);

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_fou)
    {
        $fournisseur = Fournisseur::find($id_fou);

        if(is_null($fournisseur))
            return RequestReturns::NOT_EXIST;

        try
        {
            $fournisseur->delete();

            return $fournisseur;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }
}
