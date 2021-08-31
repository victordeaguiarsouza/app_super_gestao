@extends('app.layouts.basico')

@section('titulo', 'Cliente')
    
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('cliente.create') }}">Novo</a></li>
                <li> <a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
        
            <div style="width: 90%; margin-left:auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr> 
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clientes as $c)
                            <tr>
                                <td>{{ $c->nome }}</td>
                                <td><a href="{{ route('cliente.show',['cliente'=>$c->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit',['cliente'=>$c->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$c->id}}" action="{{ route('cliente.destroy', ['cliente' => $c->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$c->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                
                {{ $clientes->appends($request)->links() }}
                <br>
                {{ $clientes->total() }} - Total de registros

            </div>
        
        </div>

    </div>

@endsection