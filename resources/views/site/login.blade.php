@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ isset($erro) && $erro != '' ? $erro : ''}}
                <form action="{{route('site.login')}}" method="post">
                    @csrf
                    <input name="login" value="{{old('login')}}" type="text" placeholder="E-mail" class="borda-preta" />
                    {{ $errors->has('login')? $errors->first('login') : '' }}
                    <input name="senha" value="{{old('senha')}}" type="password" placeholder="Senha" class="borda-preta" />
                    {{ $errors->has('senha')? $errors->first('senha') : '' }}
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                
            </div>
        </div>  
    </div>

@endsection