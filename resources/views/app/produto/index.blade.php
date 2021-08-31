@extends('app.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.create') }}">Novo</a></li>
                <li> <a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
        
            <div style="width: 90%; margin-left:auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr> 
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produtos as $p)
                            <tr>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->descricao }}</td>
                                <td>{{ $p->fornecedor->nome }}</td>
                                <td>{{ $p->peso }}</td>
                                <td>{{ $p->unidade_id }}</td>
                                <td>{{ $p->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $p->produtoDetalhe->altura ?? ''}}</td>
                                <td>{{ $p->produtoDetalhe->largura ?? ''}}</td>
                                <td><a href="{{ route('produto.show',['produto'=>$p->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit',['produto'=>$p->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$p->id}}" action="{{ route('produto.destroy', ['produto' => $p->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($p->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">{{ $pedido->id }}</a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                
                {{ $produtos->appends($request)->links() }}
                <br>
                {{ $produtos->total() }} - Total de registros

            </div>
        
        </div>

    </div>

@endsection