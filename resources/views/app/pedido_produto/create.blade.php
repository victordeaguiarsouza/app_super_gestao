@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')
    
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>{{$titulo}}</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li> <a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            
            <h4>Detalhes do pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome do produto</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $p)                            
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{$p->pivot->id}}" method="POST" action="{{ route('pedido-produto.destroy',['pedidoProduto' => $p->pivot->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$p->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                    
                @endcomponent
            </div>
            
        </div>

    </div>

@endsection