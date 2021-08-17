{{ $slot }}
<form action={{ route('site.contato')}} method="post">
                    
    @csrf

    <input name='nome' value="{{old('nome')}}"" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name='telefone' value="{{old('telefone')}}"" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name='email' value="{{old('email')}}"" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name='motivo' lass="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos as $key => $m)
           <option value="{{$m->id}}" {{old('motivo') == $m->id ? 'selected' : ''}}>{{$m->nome}}</option>
        @endforeach
    </select>
    <br>
    <textarea name='mensagem' value={{old('email')}} class="{{ $classe }}">
        @if (old('mensagem') != '')
            {{old('mensagem')}}
        @else
            Preencha aqui a sua mensagem
        @endif
    </textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>