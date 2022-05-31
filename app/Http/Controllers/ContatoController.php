<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contatoSalvar(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => ['required', 'max:20'],
            'email' => ['required', 'max:80'],
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);
        echo 'teste';
        /* SiteContato::create($request->all());

        return redirect(route('site.contato')); */
    }
    public function contato()
    {
        $motivos_contato = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        return view('site.contato', [
            'titulo' => 'Contato',
            'motivos_contato' => $motivos_contato
        ]);
    }
}
