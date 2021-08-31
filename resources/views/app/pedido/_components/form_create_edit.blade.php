<form action="{{ isset($pedido->id)? route('pedido.update',['pedido' => $pedido->id]) : route('pedido.store') }}" method="post">

    @csrf
    @if(isset($pedido->id)) @method('PUT') @endif

    <input type="hidden" value="{{ $pedido->id ?? old('id') }}" name="id">

    <select name="cliente_id">
        <option>-- Selecione um Cliente --</option>
        @foreach ($clientes as $c)
            <option value="{{$c->id}}" {{ ( $pedido->cliente_id ?? old('cliente_id') ) == $c->id ? 'selected' : ''}}>{{ $c->nome}}</option>
        @endforeach
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

    <button type="submit">Salvar</button>

</form>