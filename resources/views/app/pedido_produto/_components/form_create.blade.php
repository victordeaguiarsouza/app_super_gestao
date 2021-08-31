<form action="{{ route('pedido-produto.store',['pedido' => $pedido->id]) }}" method="post">

    @csrf
    <input type="hidden" value="{{ $pedido->id ?? old('id') }}" name="id">

    <select name="produto_id">
        <option>-- Selecione um Produto --</option>
        @foreach ($produtos as $p)
            <option value="{{$p->id}}" {{ old('produto_id') == $p->id ? 'selected' : ''}}>{{ $p->nome}}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') ?? '' }}" placeholder="Quantidade" class="borda-preta"/>
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit">Salvar</button>

</form>