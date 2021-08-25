<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title> Super Gestão - @yield('titulo') </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        
        @if($errors->any())    
            <div style="top: 0px; width:100%; background:red;">
                
                @foreach ($errors->all() as $e)
                    * {{ $e }}</br>
                @endforeach

            </div>
        @endif

        @include('site.layouts._partials.topo')

        @yield('conteudo')

        @include('site.layouts._partials.rodape')

    </body>

</html>