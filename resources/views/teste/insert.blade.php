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
    
    <form class="container mt-3" action="{{ route('teste.insertPost') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="input-nome" aria-describedby="Nome cadastrado" name="nome">
        </div>
        
        <div class="mb-3">
            <label for="input-telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="input-telefone" aria-describedby="Telefone cadastrado" name="telefone">
        </div>

        <div class="mb-3">
            <label for="input-email" class="form-label">Email</label>
            <input type="text" class="form-control" id="input-email" aria-describedby="Email cadastrado" name="email">
        </div>
        
        <div class="mb-3">
            <label for="motivo_contatos_id" class="form-label">Motivo contato</label>
            <select name="motivo_contatos_id" id="motivo_contatos_id">
                @foreach ($motivosContato as $motivoContato)
                <option value="{{$motivoContato->id}}">{{$motivoContato->motivo_contato}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label><br>
            <textarea name="mensagem" id="mensagem" cols="50" rows="5"></textarea>
        </div>

        <input type="submit" class="btn btn-success" name="submit" value="Salvar">

    </form>
</body>
</html>