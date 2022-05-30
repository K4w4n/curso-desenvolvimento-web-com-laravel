<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();

        $fornecedor->nome = 'Lubauto';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'lub@gmail.com';
        $fornecedor->site = 'lub.com';
        $fornecedor->save();

        Fornecedor::create([//Lembresse do atributo fillable
            'nome' => 'Reilub',
            'site' => 'reilub.com',
            'uf' => 'SP',
            'email' => 'reilub.com'
        ]);

        //Insert

        DB::table('fornecedores')->insert([//Não seta o created_at
            'nome' => 'Outrolub',
            'site' => 'outrolub.com',
            'uf' => 'SP',
            'email' => 'outrolub.com'
        ]);
    }
}
