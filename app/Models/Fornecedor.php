<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';//Sobrepondo o atributo definido automaticamente pelo model.
    protected $fillable = ['nome','site', 'email', 'uf'];

    /* Inserindo dados usando uma instância: */
    /* $f = new App\Models\Fornecedor();
    $f->nome = 'kawan';
    $f->site = 'kawan.com';
    $f->email = 'contato@kawan.com';
    $f->uf = 'SP';
    $f->getAttributes();
    $f->save(); */

    /* Inserindo d ados usando método estatico */
    /* App\Models\Fornecedor::create([
        'nome'->'kawan',
        'site'->'kawan.com',
        'email'->'contato@kawan.com',
        'uf'->'SP'
    ]); */

    /* Pegando todos os dados: */
    /* Fornecedor::all() */

    /* Pegando um item por pk*/
    /* Fornecedor::find(id) */
    
    /* Pegando varios itens por pk*/
    /* Fornecedor::find([id1, id2]) */
}
