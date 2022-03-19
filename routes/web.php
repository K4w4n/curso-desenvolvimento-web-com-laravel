<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre', 'App\Http\controllers\SobreNosController@sobre')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::prefix('/app')->group(function () {

    Route::get('/login', function () {
        return 'login';
    })->name('login');

    Route::get('/clientes', function () {
        return 'clientes';
    })->name('clientes');

    Route::get('/fornecedores', 'App\Http\Controllers\FornecedoresController@index')
        ->name('fornecedores');

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

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste');

/* Route::redirect('/rota2', '/rota1'); */
Route::fallback(function () {
    echo 'A pagina não existe';
});
