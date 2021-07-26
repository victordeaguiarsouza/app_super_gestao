<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function execute()
    {
        return view('site.contato');
    }

}
