<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index()
    {
        //[...code]
        $fornecedores = [
            [
                'name' => 'Açúcar Fino',
                'status' => 'N',
                'ddd' => '11', //São Paulo(Sp)
                'telefone' => '0000-0000',
                'starts' => 2
            ],

            [
                'name' => 'Farinha Neve',
                'status' => 'S',
                'ddd' => '85', //Fortaleza(CE)
                'telefone' => '0000-0000',
                'starts' => 3
            ],

            [
                'name' => 'Panelas Inox',
                'status' => 'S',
                'ddd' => '32', //Juiz de fora(MG)
                'telefone' => '0000-0000',
                'starts' => 5
            ]
        ];
        echo view('app.fornecedores.index', compact('fornecedores'));
    }
}
