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
    public function insert(Request $request)
    {
        if (empty($request->input('submit'))) {
            return view('teste.insert');
        } else {
            SiteContato::create($request->all());
            return redirect()->route('teste.contatos');
        }
    }
    public function update(Request $request)
    {
        if (empty($request->input('submit'))) {

            return view('teste.update', SiteContato::find($request->input('id')));
            
        } else {
            
            $contato = SiteContato::find($request->input('id'));
            
            $contato->fill($request->all());

            $contato->save();

            return redirect()->route('teste.contatos');
        }
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
