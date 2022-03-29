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

Selecionando por data

SiteContato::whereDate('column', '2022-03-21')->get();

SiteContato::whereDay('column', '21')->get();

SiteContato::whereMonth('column', '2')->get();

SiteContato::whereYear('column', '2')->get();

SiteContato::whereTime('column', '=','22:01:17')->get();

SiteContato::whereColumn('column1', 'column2')->get();
SiteContato::whereColumn('column1', '<', 'column2')->get();
SiteContato::whereColumn('column1', '>', 'column2')->get();

*/
/* O seguinte código gera o seguinte sql: 
   SELECT * 
    FROM site_contatos 
    WHERE (nome = 'jorge' or nome = 'ana') 
      and (motivo_contato in (1, 2) or id between 4 and 6) ;

    SiteContato::where(function ($query) {
        $query->where('nome', 'jorge')->orWhere('nome', 'ana');
    })->where(function ($query) {
        $query->whereIn('motivo_contato', [1, 2])->orWhereBetween('id', [4, 6]);
    });
*/
