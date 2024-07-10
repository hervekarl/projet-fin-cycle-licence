<?php

namespace App\Http\Controllers;

use App\Models\Medicamment;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MedicammentController extends Controller
{
    public function store($intitule, $quantite, $categorie)
    {
        $medicamment = Medicamment::create([
            'intitule_medicamment' => $intitule,
            'quantite_medicamment' => $quantite,
            'categorie_medicamment' => $categorie,
        ]);

        if(is_null($medicamment))
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $medicamment = $request->all();

        return $this->store($medicamment["intitule_medicamment"], $medicamment["quantite_medicamment"], $medicamment["categorie_medicamment"]);
    }
    
    public function show($id_med)
    {
        $medicamment = Medicamment::find($id_med);

        if(is_null($medicamment))
            return null;

        return $medicamment;
    }
    
    public function index()
    {
        $medicamments = Medicamment::all();

        return $medicamments;
    }
        
    public function update($id_med, $intitule, $quantite, $categorie)
    {
        $medicamment = Medicamment::find($id_med);

        if(is_null($medicamment))
            return null; //Enregistrement n'existe pas

        try
        {
            $medicamment->update([
                'id_medicamment' => $id_med,
                'intitule_medicamment' => $intitule,
                'quantite_medicamment' => $quantite,
                'categorie_medicamment' => $categorie,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_med)
    {
        $medicamment = Medicamment::find($id_med);

        if(is_null($medicamment))
            return null;

        try
        {
            $medicamment->delete();

            return $medicamment;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }
}
