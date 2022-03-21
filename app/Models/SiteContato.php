<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
}
/* 
Fazendo consultas:
SiteContato::where('coluna', 'operador', 'valor')->get(); 

Omitindo o igual
SiteContato::where('coluna', 'valor')->get(); 

Usando Like
SiteContato::where('coluna', 'like', '%valor%');

Pesquisando lista de valores
SiteContato::whereIn('coluna', ['valor1', 'valor2'...])

Pesquisando o inverso da lista de valores
SiteContato::whereNotIn('coluna', ['valor1', 'valor2'...]);

Pesquisando intervalos
SiteContato::whereBetween('coluna', [$indiceInicial, $indiceFinal])

Pesquisando o inverso do intervalo
SiteContato::whereNotBetween('coluna', [$indiceInicial, $indiceFinal])

Multiplos wheres 
SiteContato::whereIn('motivo_contato', [1, 2])
    ->where('telefone', 'like', '(11)%')->get();

Multiplos wheres com or
SiteContato::whereIn('motivo_contato', [1, 2])
    ->orWhere('telefone', 'like', '(11)%')->get();

Selecionando colunas vazias:
SiteContato::whereNull('updated_at')->get();

SiteContato::whereNull('updated_at')
    ->orWhereNull('created_at')
    ->get();
*/
