<?php

use App\Http\Controllers\Controller;
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
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobrenosController@sobrenos')->name('site.sobrenos');

Route::get('/contato','ContatoController@contato')->name('site.contato');

Route::get('/login', function() {
    return 'Login';
})->name('site.login');

// agrupamento das rotas app
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function() {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', function() {
        return 'Fornecedores';
    })->name('app.fornecedores');

    Route::get('/produtos', function() {
        return 'Produtos';
    })->name('app.produtos');

});

Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');

// redirect pela function de callback
Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

// redirect simples
// Route::redirect('/rota2', 'rota1');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ser direcionado há página inicial!';
});
