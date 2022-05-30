@php
    $motivoContato = [
    1=>"Dúvida",
    2=>"Elogio",
    3=>"Reclamação"
];    
@endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="d-flex flex-column justify-content-center">
    <table class="table table-striped table-hover">
        <thead>
            <tr class="table-dark">
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Motivo</th>
                <th>Mensagem</th>
                <th>Ação</th>
            </tr>
        </thead>

<tbody>
    @foreach ($contatos as $contato)
    <tr>
        <td>
            {{$contato['id']}}
        </td>
        <td>
            {{$contato['nome']}}
        </td>
        <td>
            {{$contato['telefone']}}
        </td>
        <td>
            {{$contato['email']}}
        </td>
        <td>
            {{$motivoContato[$contato['motivo_contato']]}}
        </td>
        <td>
            {{$contato['mensagem']}}
        </td>
        <td>
            <input type="button" value="Editar" class="btn btn-warning d-inline" onclick="window,location.assign('{{ route('teste.update', ['id'=>$contato['id']]) }}')" style="width: 100%;">
            <form action="{{ route('teste.delete', ['id'=>$contato['id']]) }}" method="post" class="d-inline" style="width: 100%;">
                <input type="submit" class="btn btn-danger" value="Excluir" style="width: 100%;">
                @csrf
            </form>
        </td>
    </tr>    
    @endforeach
</tbody>
</table>
<a class="btn btn-primary align-self-end m-2" href="{{route('teste.insert')}}">Criar</a>
</body>
</html>