<?php

namespace App\Http\Controllers;

use PDO;
use PDOException;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

require "sess_config.php";

class UserController extends Controller
{
    public function store($name, $email, $passwd)
    {
        try
        {   
            start_sess();
            $users = User::where('name', $_SESSION['name']);

            if(!$user->first()->is_admin)
                return RequestReturns::INSERT_NOT_PERMIT;

            $create_table = [
                'name' => $name,
                'email' => $email,
                'password' => $passwd,

                'can_insert' => true,
                'can_select' => true,
                'can_update' => true,
                'can_delete' => true,                                                                
                'is_admin' => true,
                
                'is_connected' => false,
                'id_module' => 1
            ];
            $user = User::create($create_table);

            $create_table['id_module'] = 2;
            $user = User::create($create_table);

            $create_table['id_module'] = 3;
            $user = User::create($create_table);

            $create_table['id_module'] = 4;
            $user = User::create($create_table);

            if(is_null($user))
                return INSERT_FAILED;
        
            return RequestReturns::INSERT_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::ALREADY_EXIST;
        }
        catch(ErrorException $e)
        {
            return RequestReturns::NOT_CONNECTED;
        }
    }

    public function create(Request $request)
    {
        $user = $request->all();

        return $this->store($user["name"], $user["email"], $user["password"], $user["is_admin"]);
    }
    
    public function show($id_user)
    {
        start_sess();
        $user2 = User::find($_SESSION['id']);
        
        if(!$user2->is_admin)
            return RequestReturns::SELECT_NOT_PERMIT;


        $user = User::find($id_user);

        if(is_null($user))
            return RequestReturns::NOT_EXIST;

        return $user;
    }
    
    public function index()
    {
        start_sess();
        $users2 = User::where('name', $_SESSION['name']);

        if(!$user2->first()->is_admin)
            return RequestReturns::SELECT_NOT_PERMIT;


        $users = User::all();

        return $users;
    }

    public function update($name, $email, $passwd)
    {
        // $user = User::find($id_user);

        // if(is_null($user))
        //     return RequestReturns::NOT_EXIST;

        try
        {
            start_sess();
            $users = User::where('name', $_SESSION['name']);

            // if(!$users->first()->is_admin)
            //     return RequestReturns::UPDATE_NOT_PERMIT;
            
            foreach($users->get() as $user2)
            {
                $user = $users->update([
                    'id_user' => $user2->id_uer,
                    'name' => $user2->name,
                    'email' => $user2->email,
                    'password' => $user2->passwd,
                ]);
            }

            return RequestReturns::UPDATE_SUCCESSFUL;
        }
        catch(QueryException $e)
        {
            return RequestReturns::UPDATE_FAILED;
        }
    }

        
    // public function update($id_user, $name, $email, $passwd, $admin, $id_mod)
    // {
    //     $user = User::find($id_user);

    //     if(is_null($user))
    //         return RequestReturns::NOT_EXIST;

    //     try
    //     {
    //         start_sess();
    //         $user2 = User::find($_SESSION['id']);
            
    //         if(!$user2->is_user != )
    //             return RequestReturns::UPDATE_NOT_PERMIT;

    //         $user = User::find($id_user)->update([
    //             'id_user' => $id_user,
    //             'name' => $name,
    //             'email' => $email,
    //             'password' => $passwd,

    //             'can_insert' => false,
    //             'can_select' => false,
    //             'can_update' => false,
    //             'can_delete' => false,                                                                
    //             'is_admin' => $admin,
                
    //             'is_connected' => false,
    //             'id_module' => $id_mod
    //         ]);
            
    //         return RequestReturns::UPDATE_SUCCESSFUL;
    //     }
    //     catch(QueryException $e)
    //     {
    //         return RequestReturns::UPDATE_FAILED;
    //     }
    // }

    public function destroy($name)
    {
        // $user = User::find($id_user);

        // if(is_null($user))
        //     return RequestReturns::NOT_EXIST;

        try
        {
            start_sess();
            $users = User::where('name', $_SESSION['name']);

            if(!$users->first()->is_admin)
                return RequestReturns::DELETE_NOT_PERMIT;


            foreach($users->get() as $user2)
            {
                $user2->delete();
            }

            return DELETE_SUCCESSFUL;
        }

        catch(QueryException $e)
        {
            return RequestReturns::DELETE_FAILED;
        }
    }

    public function truncate()
    {
        $users  = User::all();

        foreach($users as $user)
        {
            if($user->name != 'postgres' || $user->name != 'moi')
                $this->destroy($user->id_user);
        }

        return RequestReturns::DELETE_SUCCESSFUL;
    }

    
    public function login($name, $passwd)
    {
        $user = User::where(['name' => $name, 'password' => $passwd]);
        $user2 = $users->first();

        if(is_null($user2))
            return RequestReturns::NOT_EXIST;
        
        start_sess();
        $user2->is_connected = true;
        $user2->save();
        $_SESSION['name'] = $name;

        return RequestReturns::CONNECTION_SUCCESSFUL;
    }

    public function logout()
    {
        start_sess();
        $user = User::find($_SESSION['name']);
        $user->is_connected = false;
        $user->save();
        $_SESSION['id'] = null;
        end_sess();
        return RequestReturns::DECONNECTION_SUCCESSFUL;
    }
}
