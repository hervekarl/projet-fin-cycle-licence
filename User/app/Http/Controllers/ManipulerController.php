<?php

namespace App\Http\Controllers;

use App\Models\Manipuler;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ManipulerController extends Controller
{
    public function store($id_user, $id_mod)
    {
        try
        {
            $manipulation = Manipuler::create([
                'id_user' => $id_user,
                'id_mod' => $id_mod,
            ]);
            
            if(is_null($manipulation))
                return "";

            return "Ajout reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Ajout echouee
        }
    }

    public function create(Request $request)
    {
        $manipulation = $request->all();

        return $this->store($manipulation['id_user'], $manipulation['id_mod']);
    }
    
    public function show($id_user, $id_mod)
    {
        $manipulation = Manipuler::where(['id_user' => $id_user, 'id_mod' => $id_mod])->first();
        
        if(is_null($manipulation))
            return null;

        return $manipulation;
    }
    
    public function index()
    {
        $manipulations = Manipuler::all();

        return $manipulations;
    }
        
    public function update($id_user, $id_mod)
    {
        $manipulation = Manipuler::where(['id_user' => $id_user, 'id_mod' => $id_mod,]);
        
        if(is_null($manipulation->first()))
            return null; //Enregistrement n'existe pas
    
        try
        {
            $manipulation->update([
                'id_user' => $id_user,
                'id_mod' => $id_mod,
            ]);

            return "Mise à jour reussit";
        }
        catch(QueryException $e)
        {
            return ""; //Mise à jour echouee
        }
    }

    public function destroy($id_user, $id_mod)
    {
        $manipulation = Manipuler::where(['id_user' => $id_user, 'id_mod' => $id_mod,]);

        $manipulation2 = $manipulation->first();
        
        if(is_null($manipulation2))
            return null;

        $manipulation->delete();

        return $manipulation2;
    }

    public function truncate()
    {
        Manipuler::truncate();
        // Manipuler::query()->delete();

        return "Table videe";
    }}
