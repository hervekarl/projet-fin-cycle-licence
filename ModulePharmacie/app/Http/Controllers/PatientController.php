<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PatientController extends Controller
{
    public function store($nom, $prenom, $age, $sexe, $adresse, $tel)
    {
        $patient = Patient::create([
            'nom_patient' => $nom,
            'prenom_patient' => $prenom,
            'age_patient' => $age,
            'sexe_patient' => $sexe,
            'adresse_patient' => $adresse,
            'tel_patient' => $tel
        ]);

        if(is_null($patient))
            return "";

        return "Ajout reussit";
    }

    public function create(Request $request)
    {
        $patient = $request->all();

        return $this->store($patient["nom_patient"], $patient["prenom_patient"], $patient["age_patient"], $patient["sexe_patient"], $patient["adresse_patient"], $patient["tel_patient"]);
    }
    
    public function show($id_pat)
    {
        $patient = Patient::find($id_pat);

        if(is_null($patient))
            return null;

        return $patient;
    }
    
    public function index()
    {
        $patients = Patient::all();

        return $patients;
    }
        
    public function update($id_pat, $nom, $prenom, $age, $sexe, $adresse, $tel)
    {
        $patient = Patient::find($id_pat);

        if(is_null($patient))
            return null; //Enregistrement n'existe pas

        try
        {
            $patient->update([
                'id_patient' => $id_pat,
                'nom_patient' => $nom,
                'prenom_patient' => $prenom,
                'age_patient' => $age,
                'sexe_patient' => $sexe,
                'adresse_patient' => $adresse,
                'tel_patient' => $tel
                ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_pat)
    {
        $patient = Patient::find($id_pat);

        if(is_null($patient))
            return null;

        try
        {
            $patient->delete();

            return $patient;
        }

        catch(QueryException $e)
        {
            return "Suppression échoué";
        }
    }
}
