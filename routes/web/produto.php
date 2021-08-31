<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProdutoController;
use \App\Http\Controllers\ProdutoDetalheController;

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::resource('/produto', ProdutoController::class );
    Route::resource('/produto-detalhe', ProdutoDetalheController::class );
});