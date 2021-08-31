<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClienteController;

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::resource('/cliente', ClienteController::class );
});