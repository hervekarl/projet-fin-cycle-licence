<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EmployeController extends Controller
{
    public function store($nom, $prenom, $sexe, $adresse, $tel, $date, $compte, $salaire)
    {
        $employe = Employe::create([
            'nom_employe' => $nom,
            'prenom_employe' => $prenom,
            'sexe_employe' => $sexe,
            'adresse_employe' => $adresse,
            'tel_employe' => $tel,
            'date_naiss_employe' => $date,
            'compte_employe' => $compte,
            'salaire_employe' => $salaire
        ]);

        if(is_null($employe))
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $employe = $request->all();

        return $this->store($employe["nom_employe"], $employe["prenom_employe"], $employe["sexe_employe"], $employe["adresse_employe"], $employe["tel_employe"], $employe["date_naiss_employe"], $employe["compte_employe"], $employe["salaire_employe"]);
    }
    
    public function show($id_emp)
    {
        $employe = Employe::find($id_emp);

        if(is_null($employe))
            return null;

        return $employe;
    }
    
    public function index()
    {
        $employes = Employe::all();

        return $employes;
    }
        
    public function update($id_emp, $nom, $prenom, $sexe, $adresse, $tel, $date, $compte, $salaire)
    {
        $employe = Employe::find($id_emp);

        if(is_null($employe))
            return null; //Enregistrement n'existe pas

        try
        {
            $employe->update([
                'id_employe' => $id_emp,
                'prenom_employe' => $prenom,
                'sexe_employe' => $sexe,
                'adresse_employe' => $adresse,
                'tel_employe' => $tel,
                'date_naiss_employe' => $date,
                'compte_employe' => $compte,
                'salaire_employe' => $salaire
                    ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_emp)
    {
        $employe = Employe::find($id_emp);

        if(is_null($employe))
            return null;

        try
        {
            $employe->delete();

            return $employe;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }
}
