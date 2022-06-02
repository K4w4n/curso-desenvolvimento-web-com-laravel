{{$slot}}
<form action={{route('site.contato')}} method="post">
    @csrf
    <input type="text" value="{{old('nome')}}" placeholder="Nome" name="nome" class="{{$classe ?? ''}}">
    <br>
    <input type="text" value="{{old('telefone')}}" placeholder="Telefone" name="telefone" class="{{$classe ?? ''}}">
    <br>
    <input type="text" value="{{old('email')}}" placeholder="E-mail" name="email" class="{{$classe ?? ''}}">
    <br>
    <select class="{{$classe ?? ''}}" name="motivo_contato">
        <option value="" {{old('motivo_contato') == '' ? 'selected': ''}}>Qual o motivo do contato?</option>
        
        @foreach ($motivos_contato as $key =>$motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected': ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach

    </select>
    <br>
    
    <textarea class="{{$classe ?? ''}}" name="mensagem">{{old('mensagem') ?? 'Preencha aqui a sua mensagem'}}</textarea>

    <br>
    <button type="submit" class="{{$classe ?? ''}}">ENVIAR</button>
</form>
@if ($errors->any)
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif