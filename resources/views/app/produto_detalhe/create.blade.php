@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhe')
    
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>{{$titulo}}</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.index') }}">Voltar</a></li>
                <li> <a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            
            <div>Nome: {{ $produto_detalhe->produto->nome }}</div>
            <div>Descrição: {{ $produto_detalhe->produto->descricao }}</div>

            <div style="width: 30%; margin-left:auto; margin-right: auto;">

                @component('app.produto_detalhe._components.form_create_edit',['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                    
                @endcomponent
            </div>
        
        </div>

    </div>

@endsection