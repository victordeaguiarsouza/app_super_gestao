<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PedidoController;
use \App\Http\Controllers\PedidoProdutoController;

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::resource('/pedido', PedidoController::class );

    Route::get('/pedido-produto/create/{pedido}'            , [PedidoProdutoController::class ,'create' ] )->name('pedido-produto.create');
    Route::post('/pedido-produto/store/{pedido}'            , [PedidoProdutoController::class ,'store'  ] )->name('pedido-produto.store');
    Route::delete('/pedido-produto/destroy/{pedidoProduto}' , [PedidoProdutoController::class ,'destroy'] )->name('pedido-produto.destroy');
});