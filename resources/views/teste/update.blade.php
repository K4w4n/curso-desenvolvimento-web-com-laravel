<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <form class="container mt-3" action="{{ route('teste.update') }}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="input-id" class="form-label">Id</label>
            <input type="text" class="form-control" id="input-id" aria-describedby="Nome cadastrado" value="{{$id}}" name="id" readonly="readonly">
        </div>

        <div class="mb-3">
            <label for="input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="input-nome" aria-describedby="Nome cadastrado" value="{{$nome}}" name="nome">
        </div>
        
        <div class="mb-3">
            <label for="input-telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="input-telefone" aria-describedby="Telefone cadastrado" value="{{$telefone}}" name="telefone">
        </div>

        <div class="mb-3">
            <label for="input-email" class="form-label">Email</label>
            <input type="text" class="form-control" id="input-email" aria-describedby="Email cadastrado" value="{{$email}}" name="email">
        </div>
        
        <div class="mb-3">
            <label for="motivo_contato" class="form-label">Motivo contato</label>
            <select name="motivo_contato" id="motivo_contato" name="motivo_contato">
                <option value="1" @if ($motivo_contato == 1) selected @endif>Dúvida</option>
                <option value="2" @if ($motivo_contato == 2) selected @endif>Elogio</option>
                <option value="3" @if ($motivo_contato == 3) selected @endif>Reclamação</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label><br>
            <textarea name="mensagem" id="mensagem" cols="50" rows="5"> {{$mensagem}}</textarea>
        </div>

        <input type="submit" class="btn btn-warning" name="submit" value="Update">

    </form>
</body>
</html>