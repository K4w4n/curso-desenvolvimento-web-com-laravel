<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceTesteController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
    Route::get('/sobre', [SobreNosController::class, 'sobre'])->name('site.sobrenos');
    Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
    Route::post('/contato', [ContatoController::class, 'contatoSalvar'])->name('site.contatoSalvar');
});

Route::prefix('/teste')->group(function () {
    Route::get('/', [SpaceTesteController::class, 'index'])->name('teste.home');
    Route::get('/contatos', [SpaceTesteController::class, 'select'])->name('teste.contatos');

    Route::get('/insert', [SpaceTesteController::class, 'insert'])->name('teste.insert');
    Route::get('/update', [SpaceTesteController::class, 'update'])->name('teste.update');
    Route::post('/delete', [SpaceTesteController::class, 'delete'])->name('teste.delete');
    Route::get('/delete', [SpaceTesteController::class, 'selectOnlyTrashed'])->name('teste.deleteView');

    Route::get('/teste', function () {
        $faker = Faker\Factory::create('pt_BR');
        echo json_encode([
            'nome' => $faker->name(),
            'telefone' => $faker->cellphoneNumber(),
            'email' => $faker->email(),
            'motivo_contato' => $faker->numberBetween(1, 3),
            'mensagem' => $faker->sentence(),
        ]);
    });

    /* Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste'); */
});

Route::prefix('/app')->group(function () {

    Route::get('/login', function () {
        return 'login';
    })->name('login');

    Route::get('/clientes', function () {
        return 'clientes';
    })->name('clientes');

    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedores');

    Route::get('/produtos', function () {
        return 'produtos';
    })->name('produtos');
});

Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Guesth',
        int $categoria_id = 1,
    ) {
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/rota1', function () {
    echo 'Rota1';
})->name('r1');

Route::get('/rota2', function () {
    return redirect()->route('r1');
});


/* Route::redirect('/rota2', '/rota1'); */
Route::fallback(function () {
    echo 'A pagina não existe';
});
