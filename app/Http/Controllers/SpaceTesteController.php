<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class SpaceTesteController extends Controller
{
    public function index()
    {
        return redirect()->route('teste.contatos');
    }
    public function select()
    {
        $data = [
            'contatos' => SiteContato::all()
        ];
        return view('teste.contatos', $data);
    }
    public function selectOnlyTrashed()
    {
        $data = [
            'contatos' => SiteContato::onlyTrashed()->get()
        ];
        return view('teste.contatos', $data);
    }
    public function insert()
    {
        if (empty($_REQUEST['submit'])) {
            return view('teste.insert');
        } else {
            $contato = new SiteContato();

            $contato->nome = $_REQUEST['nome'];
            $contato->telefone = $_REQUEST['telefone'];
            $contato->email = $_REQUEST['email'];
            $contato->motivo_contato = $_REQUEST['motivo_contato'];
            $contato->mensagem = $_REQUEST['mensagem'];

            $contato->save();

            return redirect()->route('teste.contatos');
        }
    }
    public function update()
    {
        if (empty($_REQUEST['submit'])) {
            return view('teste.update', SiteContato::where('id', $_REQUEST['id'])->get()[0]);
        } else {

            $contato = SiteContato::find($_REQUEST['id']);
            #error_log('Erro');
            $contato->fill([
                'nome' => $_REQUEST['nome'],
                'telefone' => $_REQUEST['telefone'],
                'email' => $_REQUEST['email'],
                'motivo_contato' => $_REQUEST['motivo_contato'],
                'mensagem' => $_REQUEST['mensagem']
            ]);

            $contato->save();

            return redirect()->route('teste.contatos');
        }
    }
    public function delete()
    {

        $contatosDeletados = SiteContato::destroy($_REQUEST['id']);

        if ($contatosDeletados >= 1) {
            return redirect()->route('teste.contatos');
        } else {
            return redirect()->back()->withErrors(['error', "Registo #{$_REQUEST['id']} não pode ser excluído"]);
        }
    }
}
