<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Posseder;
use Illuminate\Http\Request;

class PossederController extends Controller
{

//-------

    public function store($id_sal, $id_equip, Request $request)
    {

        // $date_debut = date('2023-07-03');

        $date_debut = new DateTime();
        echo $date_debut->format('Y-m-d');

        // $posseder = new Posseder();

        // dd($posseder);

        $this->end_possession($id_sal, $id_equip);

        Posseder::create([
            'id_salle' => $id_sal,
            'id_equipement' => $id_equip,
            'date_debut' => $date_debut,
        ]);
    }
    
    public function show($id_sal, $id_equip, $date_debut)
    {
        $equipement = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut])->firstOrFail();
        return $equipement;
    }

    public function index_show($id_sal, $id_equip)
    {
        $equipements = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip])->get();

        dd($equipements);

        return $equipements;
    }
    
    public function index()
    {
        $equipements = Posseder::all();
        dd($equipements);

        return $equipements;
    }
        
    public function update(Request $request, $id_sal, $id_equip, $date_debut, $date_fin)
    {
        Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut])->update([
            'id_salle' => $id_sal,
            'id_equipement' => $id_equip,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
        ]);
        // Posseder::findOrFail($id)->update($request->all());
        // return redirect()->route('equipement.index');
    }

    public function end_possession($id_sal, $id_equip)
    {
        $date_fin = new DateTime();
        $date_fin = $date_fin->format('Y-m-d');

        $posseder = Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_fin' => null]);

        // dd($posseder);

        if(!is_null($posseder->first()))
            $posseder->update([
                'id_salle' => $id_sal,
                'id_equipement' => $id_equip,
                'date_debut' => $posseder->first()->date_debut,
                'date_fin' => $date_fin,
            ]);
    }

    public function destroy($id_sal, $id_equip, $date_debut)
    {
        Posseder::where(['id_salle' => $id_sal, 'id_equipement' => $id_equip, 'date_debut' => $date_debut])->delete();
        // return redirect()->route('equipement.index');
    }
}

// $response = Http::withHeaders($headers)->{$request->method()}($url, $request->except(['_token_', '_method']));
