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
*/
