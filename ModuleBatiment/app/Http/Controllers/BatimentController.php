<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use Illuminate\Http\Request;

class BatimentController extends Controller
{

    public function store($nbre_niveau, Request $request)
    {
        Batiment::create([
            'nbre_niveau' => $nbre_niveau
        ]);
        // return view('batiment.create');
    }
    
    public function show($id_bat)
    {
        $batiment = Batiment::findOrFail($id_bat);
        return $batiment;
    }
    
    public function index()
    {
        $batiments = Batiment::all();
        return $batiments;
    }
        
    public function update(Request $request, $id_bat, $nbre_niveau)
    {
        Batiment::findOrFail($id_bat)->update([
            'id_batiment' => $id_bat,
            'nbre_niveau' => $nbre_niveau
        ]);
        // Batiment::findOrFail($id)->update($request->all());
        // return redirect()->route('batiment.index');
    }

    public function destroy($id_bat)
    {
        Batiment::findOrFail($id_bat)->delete();
        return redirect()->route('batiment.index');
    }
}
