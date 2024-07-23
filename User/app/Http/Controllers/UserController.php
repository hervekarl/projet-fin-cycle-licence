<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function store($name, $passwd, Request $request)
    {
        try
        {   
            // $user2 = User::where('email', $email);
            
            // $user3 = null;
            
            // if($request->session()->has('id'))
            //     $user3 = User::find($request->session()->get('id'));
            
            
            $user = User::where('name', $name);
            
            $create_table = [
                'name' => $name,
                // 'email' => $email,
                'password' => $passwd,
            ];
            
            if(is_null($user->first()))
            {
                $user = User::create($create_table);

                return RequestReturns::INSERT_SUCCESSFUL;
            }

            else
                return RequestReturns::ALREADY_EXIST;

            if(is_null($user))
                return RequestReturns::INSERT_FAILED;
        
        }
        catch(ErrorException $e)
        {
            return RequestReturns::NOT_CONNECTED;
        }
    }

    public function create(Request $request)
    {
        $user = $request->all();

        return $this->store($user["name"], $user["password"]);
    }
    
    public function show($id_user)
    {
        // $user2 = new User();
        // $user2->is_admin = false;

        // if($request->session()->has('id'))
        //     $user2 = User::find($request->session()->get('id'));
        
        // if(!$user2->is_admin)
        //     return RequestReturns::SELECT_NOT_PERMIT;


        $user = User::find($id_user);

        if(is_null($user))
            return RequestReturns::NOT_EXIST;

        return $user;
    }
    
    public function index(Request $request)
    {
        // $user2 = new User();
        // $user2->is_admin = false;

        // if($request->session()->has('id'))
        //     $user2 = User::find($request->session()->get('id'));

        // if(!$user2->is_admin)
        //     return $request->session()->get('id');


        $users = User::all();

        return $users;
    }

    public function update($id_user, $name, $passwd, Request $request)
    {
        $user = User::find($id_user);

        if(is_null($user))
            return RequestReturns::NOT_EXIST;

        try
        {
            // $user = User::where('name', $name);
            // // $user2 = User::where('email', $email);
            // $user3 = User::find($request->session()->get('id'));

            // if(!$users->first()->is_admin)
            //     return RequestReturns::UPDATE_NOT_PERMIT;

            $update_table = [
                'id_user' => $id_user,
                'name' => $name,
                // 'email' => $email,
                'password' => $passwd,
            ];

            $user->update($update_table);

            // if(is_null($user->first()) && is_null($user2->first()))
            // {
            //     if(!$user3->is_admin)
            //     {
            //         if($id_user != $user3->id_user)
                        // return RequestReturns::UPDATE_NOT_PERMIT;
    
            //     }
    
            //     else
            //     {
            //         if($id_user == $user3->id_user)
            //             $user0->update($update_table);

            //         else
            //         {
            //             $update_table['id_admin'] = $admin;
            //             $user0->update($update_table);
            //         }
            //     }    
            // }

            // else
            //     return RequestReturns::ALREADY_EXIST;

            
            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

    public function destroy($id_user, Request $request)
    {
        $user = User::find($id_user);

        if(is_null($user))
            return RequestReturns::NOT_EXIST;

        try
        {
            // $user2 = new User();
            // $user2->is_admin = false;

            // if($request->session()->has('id'))
            //     $user2 = User::find($request->session()->get('id'));

            // if(!$user2->is_admin)
            //     return RequestReturns::DELETE_NOT_PERMIT;

            $user->delete();

            return $user;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }

    public function truncate()
    {
        // $users  = User::all();

        // foreach($users as $user)
        // {
        //     if($user->name != 'postgres' || $user->name != 'moi')
        //         $this->destroy($user->id_user);
        // }

        Batiment::truncate();
        
        return RequestReturns::DELETE_SUCCESSFUL;
    }

    //------------------------------------------------------------------------------------------
    
    public function login($name, $passwd, Request $request)
    {
        $user = User::where(['name' => $name, 'password' => $passwd])->first();

        if(is_null($user))
            return RequestReturns::NOT_EXIST;
        
        // setcookie("connected", "true", time() + 1, "", "", false, true);

        // $request->session()->put('id', $user->id_user);

        return ['id' => $user->id_user];
    }

    // public function logout(Request $request)
    // {
    //     // if(!isset($_COOKIE["connected"]))
    //     // {
    //     // }
    //     if($request->session()->has('id'))
    //     {
    //         $request->session()->forget('id');

    //         return RequestReturns::DECONNECTION_SUCCESSFUL;    
    //     }

    //     return RequestReturns::CONNECTED;
    // }
}
