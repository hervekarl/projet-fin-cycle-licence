<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function control()
    {
        // $clients = Client::all();

        // dd($clients);
        return view('welcome');
    }

    public function u()
    {
        // $clients = Client::all();

        // dd($clients);
        return view('come');
    }
}
