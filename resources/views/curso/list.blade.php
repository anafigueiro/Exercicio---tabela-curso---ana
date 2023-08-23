<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Listagem de Cursos</h3> 
    <form action="{{ route('curso.search') }}" method="post">
        @csrf <!-- cria um hash de segurança -->
        <select name="tipo" >
            <option value="nome">Nome</option>
            <option value="requisito">Requisito</option>
            <option value="carga_horario">Carga_horario</option>
            <option value="valor">Valor</option>
        </select>
        <input type="text" name="campo">
        <button type="submit">Buscar</button>
        <a href="{{ route('curso.create') }}">Cadastrar</a><br>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Requisito</th>
            <th>Carga horária</th>
            <th>Valor</th>
        </tr>
        @foreach ($cursos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->requisito}}</td>
                <td>{{$item->carga_horario}}</td>
                <td>{{$item->valor}}</td>
                <td><a href="{{route('curso.edit', $item->id)}}">Editar</a></td>
                <td><a href="{{route('curso.destroy', $item->id)}}"
                    onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
