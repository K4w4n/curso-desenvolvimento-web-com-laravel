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
*/
