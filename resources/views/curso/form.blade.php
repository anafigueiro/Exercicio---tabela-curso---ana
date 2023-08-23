<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário Curso</title>
</head>
<body>
    <h3>Formulário de Curso</h3>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
       // dd($); // é igual ao var_dump()
        if(!empty($c->id)){
          $route = route('curso.update', $curso->id);
        } else {
          $route = route('curso.store');
        }
    @endphp
    <form action="{{ $route }}" method="post">
        @csrf <!-- cria um hash de segurança -->

        @if (!empty($curso->id))
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="@if(!empty($curso->id)){{$curso->id}}@elseif (!empty(old('id'))){{old('id')}}@else{{''}}@endif">
        <label for="">Nome</label><br>
        <input type="text" name="nome"
            value="@if (!empty($curso->nome)) {{$curso->nome}} @elseif(!empty(old('nome'))) {{old('nome')}} @else {{''}} @endif">
        <br><br>
        <label for="">Requisito</label><br>
        <input type="text" name="requisito"
            value="@if(!empty($curso->requisito)) {{$curso->requisito}} @elseif (!empty(old('requisito'))){{old('requisito')}}@else{{''}}@endif">
        <br><br>
        <label for="">Carga horária</label><br>
        <input type="text" name="carga_horario"
          value=" @if(!empty($curso->carga_horario)){{$curso->carga_horario}}@elseif(!empty(old('carga_horario'))){{old('carga_horario')}}@else{{''}}@endif"><br><br>
        <label for="">Valor</label><br>
        <input type="text" name="valor"
            value="@if (!empty($curso->valor)){{$curso->valor}}@elseif(!empty(old('valor'))) {{old('valor')}} @else{{''}}@endif"><br><br>
        <button type="submit">Salvar</button><br>
        <a href="{{ route('curso.index') }}">Voltar</a>
    </form>
</body>
</html>

