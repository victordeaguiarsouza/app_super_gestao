{{ $slot }}
<form action={{ route('site.contato')}} method="post">
                    
    @csrf

    <input name='nome' value="{{old('nome')}}"" type="text" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome')) <span style="color: red;"> {{ $errors->first('nome') }} </span> @endif
    <br>
    <input name='telefone' value="{{old('telefone')}}"" type="text" placeholder="Telefone" class="{{ $classe }}">
    @if($errors->has('telefone')) <span style="color: red;">  {{ $errors->first('telefone')}} </span> @endif
    <br>
    <input name='email' value="{{old('email')}}"" type="text" placeholder="E-mail" class="{{ $classe }}">
    @if($errors->has('email')) <span style="color: red;">  {{ $errors->first('email')}} </span> @endif
    <br>
    <select name='motivos_id' lass="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos as $key => $m)
           <option value="{{$m->id}}" {{old('motivos_id') == $m->id ? 'selected' : ''}}>{{$m->nome}}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_id')) <span style="color: red;"> {{ $errors->first('motivo_id')}} </span> @endif
    <br>
    <textarea name='mensagem' value={{old('email')}} class="{{ $classe }}">
        @if (old('mensagem') != '')
            {{old('mensagem')}}
        @else
            Preencha aqui a sua mensagem
        @endif
    </textarea>
    @if($errors->has('mensagem')) <span style="color: red;">  {{ $errors->first('mensagem')}} </span> @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>