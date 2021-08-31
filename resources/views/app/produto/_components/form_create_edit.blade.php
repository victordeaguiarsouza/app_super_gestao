<form action="{{ isset($produto->id)? route('produto.update',['produto' => $produto->id]) : route('produto.store') }}" method="post">

    @csrf
    @if(isset($produto->id)) @method('PUT') @endif

    <input type="hidden" value="{{ $produto->id ?? old('id') }}" name="id">

    <input type="text" value="{{ $produto->nome ?? old('nome') }}" name="nome"  id="nome"  placeholder="Nome"   class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" value="{{ $produto->descricao ??  old('descricao') }}" name="descricao"  id="descricao"  placeholder="Descrição"   class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

    <input type="text" value="{{ $produto->peso ?? old('peso') }}" name="peso"    id="peso"    placeholder="Peso"     class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

    <select name="fornecedor_id">
        <option>-- Selecione um fornecedor --</option>
        @foreach ($fornecedores as $f)
            <option value="{{$f->id}}" {{ ( $produto->fornecedor_id ?? old('fornecedor_id') ) == $f->id ? 'selected' : ''}}>{{ $f->nome}}</option>
        @endforeach
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $u)
            <option value="{{$u->id}}" {{ ( $produto->unidade_id ?? old('unidade_id') ) == $u->id ? 'selected' : ''}}>{{ $u->descricao}}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit">Salvar</button>

</form>