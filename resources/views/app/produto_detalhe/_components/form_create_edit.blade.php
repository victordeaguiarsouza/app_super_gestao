<form action="{{ isset($produto_detalhe->id)? route('produto-detalhe.update',['produto_detalhe' => $produto_detalhe->id]) : route('produto-detalhe.store') }}" method="post">

    @csrf
    @if(isset($produto_detalhe->id)) @method('PUT') @endif

    <input type="hidden" value="{{ $produto_detalhe->id ?? old('id') }}" name="id">

    <input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id"  id="produto_id"  placeholder="Produto ID"   class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento"  id="comprimento"  placeholder="Comprimento"   class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input type="text" value="{{ $produto_detalhe->altura ??  old('altura') }}" name="altura"  id="altura"  placeholder="Altura"   class="borda-preta">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <input type="text" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura"    id="largura"    placeholder="Largura"     class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $u)
            <option value="{{$u->id}}" {{ ( $produto_detalhe->unidade_id ?? old('unidade_id') ) == $u->id ? 'selected' : ''}}>{{ $u->descricao}}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit">Salvar</button>
</form>