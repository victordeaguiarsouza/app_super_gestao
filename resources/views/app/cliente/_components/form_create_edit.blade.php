<form action="{{ isset($cliente->id)? route('cliente.update',['cliente' => $cliente->id]) : route('cliente.store') }}" method="post">

    @csrf
    @if(isset($cliente->id)) @method('PUT') @endif

    <input type="hidden" value="{{ $cliente->id ?? old('id') }}" name="id">

    <input type="text" value="{{ $cliente->nome ?? old('nome') }}" name="nome"  id="nome"  placeholder="Nome"   class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <button type="submit">Salvar</button>

</form>