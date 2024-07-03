<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function store($num_etage, $nbre_salle, $id_bat, Request $request)
    {
        Niveau::create([
            'numero_etage' => $num_etage,
            'nbre_salle' => $nbre_salle,
            'id_batiment' => $id_bat
        ]);
    }
    
    public function show($id_niv)
    {
        $niveau = Niveau::findOrFail($id_niv);
        return $niveau;
    }
    
    public function index()
    {
        $niveaux = Niveau::all();
        return $niveaux;
    }
        
    public function update($id_niv, $num_etage, $nbre_salle, $id_bat, Request $request)
    {
        Niveau::findOrFail($id_niv)->update([
            'id_niveau' => $id_niv,
            'numero_etage' => $num_etage,
            'nbre_salle' => $nbre_salle,
            'id_batiment' => $id_bat
        ]);
        // Niveau::findOrFail($id)->update($request->all());
        // return redirect()->route('niveau.index');
    }

    public function destroy($id_niv)
    {
        Niveau::findOrFail($id_niv)->delete();
        // return redirect()->route('niveau.index');
    }
}
