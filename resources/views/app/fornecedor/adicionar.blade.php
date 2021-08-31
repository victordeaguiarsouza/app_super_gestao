@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
    
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li> <a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $mensagem ?? ''}}
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $fornecedor->id ?? old('id') }}" name="id">
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" name="nome"  id="nome"  placeholder="Nome"   class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" value="{{ $fornecedor->site ??  old('site') }}" name="site"  id="site"  placeholder="Site"   class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input type="text" value="{{ $fornecedor->uf ?? old('uf') }}" name="uf"    id="uf"    placeholder="UF"     class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <input type="text" value="{{ $fornecedor->email ?? old('email') }}" name="email" id="email" placeholder="E-mail" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit">Cadastrar</button>
                </form>

            </div>
        
        </div>

    </div>

@endsection