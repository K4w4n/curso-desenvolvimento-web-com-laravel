<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
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
        /* Buscando contatos no banco de dados */
        $contatos = SiteContato::leftJoin('motivo_contatos', 'motivo_contatos.id', 'site_contatos.motivo_contatos_id')
            ->select('site_contatos.*', 'motivo_contato')
            ->get();

        /* Salvando dados em array para serem inseridos na view */
        $data = [
            'contatos' => $contatos
        ];

        /* Inserindo dados na view */
        return view('teste.contatos', $data);
    }

    public function selectOnlyTrashed()
    {
        /* Buscando contatos no banco de dados */
        $contatos = SiteContato::onlyTrashed()
            ->leftJoin('motivo_contatos', 'motivo_contatos.id', 'site_contatos.motivo_contatos_id')
            ->select('site_contatos.*', 'motivo_contato')
            ->get();

        /* Salvando dados em array para serem inseridos na view */
        $data = [
            'contatos' => $contatos,
        ];

        /* Inserindo dados na view */
        return view('teste.contatos', $data);
    }

    public function insertView()
    {
        /* Busacando motivos de contato no banco de dados */
        $motivos_contato = MotivoContato::all(['id', 'motivo_contato']);

        /* Inserindo dados na view */
        return view('teste.insert', [
            'motivosContato' => $motivos_contato
        ]);
    }

    public function insertPost(Request $request)
    {
        SiteContato::create($request->all());
        return redirect()->route('teste.contatos');/* Lembrar de inserir mensagem de sucesso */
    }

    public function updateGet(Request $request)
    {
        /* Recuperando contato do banco de dados */
        $contato = SiteContato::find($request->input('id'));
        $motivosContato = MotivoContato::all(['id', 'motivo_contato']);
        
        $data = [
            'contato' => $contato,
            'motivosContato' => $motivosContato
        ];

        /* Inserindo dados na view */
        return view('teste.update', $data);
    }

    public function updatePost(Request $request)
    {
        $contato = SiteContato::find($request->input('id'));

        $contato->fill($request->all());

        $contato->save();

        return redirect()->route('teste.contatos');
    }
    public function delete(Request $request)
    {

        $contatosDeletados = SiteContato::destroy($request->input('id'));

        if ($contatosDeletados >= 1) {
            return redirect()->route('teste.contatos');
        } else {
            return redirect()->back()->withErrors(['error', "Registo #{$request->input('id')} não pode ser excluído"]);
        }
    }
}
