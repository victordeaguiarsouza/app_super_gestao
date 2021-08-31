<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{
    ContatoController, TesteController, SobreNosController, PrincipalController, 
    FornecedorController, LoginController, ClienteController, HomeController,
    ProdutoController};

Route::get('/'                , [PrincipalController::class, 'execute'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos'       , [SobreNosController::class, 'execute'])->name('site.sobrenos');

Route::get('/contato'         , [ContatoController::class, 'execute'])->name('site.contato');
Route::post('/contato'        , [ContatoController::class, 'save'])->name('site.contato');

Route::get('/teste/{p1}/{p2}' , [TesteController::class, 'execute'])->name('site.teste');

Route::get('/login/{erro?}'   , [LoginController::class, 'index'])->name('site.login');
Route::post('/login'          , [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home'    , [HomeController::class    ,'index'] )->name('app.home');
    Route::get('/sair'    , [LoginController::class   ,'sair' ] )->name('app.sair');
    
    Route::get('/fornecedor'                         , [FornecedorController::class ,'index'     ] )->name('app.fornecedor');
    Route::post('/fornecedor/listar'                 , [FornecedorController::class ,'listar'    ] )->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar'                  , [FornecedorController::class ,'listar'    ] )->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar'               , [FornecedorController::class ,'adicionar' ] )->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar'              , [FornecedorController::class ,'adicionar' ] )->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{mensagem?}' , [FornecedorController::class ,'editar'    ] )->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}'            , [FornecedorController::class ,'excluir'   ] )->name('app.fornecedor.excluir');
});

Route::fallback(function(){
    return 'A rota acessada não existe <a href="'.route('site.index').'">Clique aqui para voltar</a>';
});