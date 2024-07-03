<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function store($nom, $type, $id_niv, Request $request)
    {
        Salle::create([
            'nom_salle' => $nom,
            'type_salle' => $type,
            'id_niveau' => $id_niv
        ]);
    }
    
    public function show($id_sal)
    {
        $salle = Salle::findOrFail($id_sal);
        return $salle;
    }
    
    public function index()
    {
        $salles = Salle::all();
        return $salles;
    }
        
    public function update(Request $request, $id_sal, $nom, $type, $id_niv)
    {
        Salle::findOrFail($id_sal)->update([
            'id_salle' => $id_sal,
            'nom_salle' => $nom,
            'type_salle' => $type,
            'id_niveau' => $id_niv
        ]);
        // Salle::findOrFail($id)->update($request->all());
        // return redirect()->route('salle.index');
    }

    public function destroy($id_sal)
    {
        Salle::findOrFail($id_sal)->delete();
        // return redirect()->route('salle.index');
    }
}
