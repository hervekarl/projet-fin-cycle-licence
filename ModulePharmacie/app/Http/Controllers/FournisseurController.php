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
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $fournisseur = $request->all();

        return $this->store($fournisseur["nom_fournisseur"], $fournisseur["tel_fournisseur"], $fournisseur["adresse_fournisseur"]);
    }
    
    public function show($id_fou)
    {
        $fournisseur = Fournisseur::find($id_fou);

        if(is_null($fournisseur))
            return null;

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
            return null; //Enregistrement n'existe pas

        try
        {
            $fournisseur->update([
                'id_fournisseur' => $id_fou,
                'nom_fournisseur' => $nom,
                'tel_fournisseur' => $tel,
                'adresse_fournisseur' => $adresse,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_fou)
    {
        $fournisseur = Fournisseur::find($id_fou);

        if(is_null($fournisseur))
            return null;

        try
        {
            $fournisseur->delete();

            return $fournisseur;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }
}
