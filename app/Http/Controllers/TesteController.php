<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $n1, int $n2)
    {
        //$resultado = $n1 + $n2;
        //return view('site.teste', ['n1' => $n1, 'n2' => $n2, 'resultado' => $resultado]);//Associativo
        //return view('site.teste', compact('n1', 'n2', 'resultado'));//Compact
        return view('site.teste')
            ->with('n1', $n1)
            ->with('n2', $n2)
            ->with('resultado', $n1 + $n2);
    }
}
