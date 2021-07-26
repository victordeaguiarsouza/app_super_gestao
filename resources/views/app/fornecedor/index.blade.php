<h3>Fornecedor</h3>

@php
    /*
    if(isset($variavel)){}
    */
@endphp

@isset($fornecedores)

    @forelse ($fornecedores as $f)

        {{-- @dd($loop) --}}
        <br>
        Fornecedor: {{$f['nome']}} {{$f['ativo']}}
        <br>
        Ativo: {{$f['ativo']}}
        <br>
        CNPJ: {{ $f['cnpj']?? 'Dado não preenchido.' }}
        <br>
        Telefone: {{$f['ddd']?? ''}} {{$f['tel']?? '' }}
        <br>
        @if ($loop->first)
            Primeira iteração
        @endif
        @if ($loop->last)
            Última iteração
            <br>
            Total de registros: {{$loop->count}}
        @endif
        <hr>
    @empty
        Nenhum fornecedor foi encontrado.
    @endforelse

@endisset

