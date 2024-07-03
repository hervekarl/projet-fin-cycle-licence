<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function store($nom, $type, Request $request)
    {
        Equipement::create([
            'nom_equipement' => $nom,
            'type_equipement' => $type,
        ]);
    }
    
    public function show($id_equip)
    {
        $equipement = Equipement::findOrFail($id_equip);
        return $equipement;
    }
    
    public function index()
    {
        $equipements = Equipement::all();
        return $equipements;
    }
        
    public function update(Request $request, $id_equip, $nom, $type)
    {
        Equipement::findOrFail($id_equip)->update([
            'id_equipement' => $id_equip,
            'nom_equipement' => $nom,
            'type_equipement' => $type,
        ]);
        // Equipement::findOrFail($id)->update($request->all());
        // return redirect()->route('equipement.index');
    }

    public function destroy($id_equip)
    {
        Equipement::findOrFail($id_equip)->delete();
        // return redirect()->route('equipement.index');
    }

}
