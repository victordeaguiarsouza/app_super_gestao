<?php

namespace App\Http\Controllers;

use App\Models\Motivo;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{

    public function execute()
    {
        
        $motivos = Motivo::all();

        return view('site.principal', ['motivos' => $motivos]);
    }

}
