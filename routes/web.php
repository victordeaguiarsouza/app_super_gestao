<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{ContatoController, TesteController, SobreNosController, PrincipalController, FornecedorController};


Route::get('/'                , [PrincipalController::class, 'execute'])->name('site.index');
Route::get('/sobre-nos'       , [SobreNosController::class, 'execute'])->name('site.sobrenos');
Route::get('/contato'         , [ContatoController::class, 'execute'])->name('site.contato');
Route::post('/contato'        , [ContatoController::class, 'save'])->name('site.contato');
Route::get('/teste/{p1}/{p2}' , [TesteController::class, 'execute'])->name('site.teste');

Route::prefix('/app')->group(function(){
    Route::get('/login'        , function(){ return 'Login';})->name('app.login');
    Route::get('/clientes'     , function(){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores' , [FornecedorController::class, 'execute'])->name('app.fornecedores');
    Route::get('/produtos'     , function(){ return 'Produtos';})->name('app.produtos');
});


Route::fallback(function(){
    return 'A rota acessada não existe <a href="'.route('site.index').'">Clique aqui para voltar</a>';
});