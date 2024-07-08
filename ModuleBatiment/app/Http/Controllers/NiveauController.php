<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class NiveauController extends Controller
{
    public function store($num_etage, $nbre_salle, $id_bat)
    {
        $niveau = Niveau::create([
            'numero_etage' => $num_etage,
            'nbre_salle' => $nbre_salle,
            'id_batiment' => $id_bat
        ]);

        if(is_null($niveau))
            return "";

        return "Ajout reussit";

    }

    public function create(Request $request)
    {
        $niveau = $request->all();

        return $this->store($niveau["numero_etage"], $niveau["nbre_salle"], $niveau["id_batiment"]);
    }

    public function show($id_niv)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return null;

        return $niveau;
    }
    
    public function index()
    {
        $niveaux = Niveau::all();

        return $niveaux;
    }
        
    public function update($id_niv, $num_etage, $nbre_salle, $id_bat)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return null; //Enregistrement n'existe pas

        try
        {
            $niveau->update([
                'id_niveau' => $id_niv,
                'numero_etage' => $num_etage,
                'nbre_salle' => $nbre_salle,
                'id_batiment' => $id_bat
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_niv)
    {
        $niveau = Niveau::find($id_niv);

        if(is_null($niveau))
            return null;

        try
        {
            $niveau->delete();

            return $niveau;
        }
        
        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }

    // public function truncate()
    // {
    //     Niveau::truncate();
    //     // Batiment::query()->delete();

    //     return "Table videe";
    // }
}
