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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('cliente_cad');

Route::post('/cliente/adicionar', 'ClienteController@adicionar')->name('cliente_add');

Route::get('/cliente/listar', 'ClienteController@listar')->name('listar');

Route::get('/cliente/buscar/{id}', 'ClienteController@telaAlteracao')->name('cliente_update');

Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')->name('cliente_alt');

Route::get('/cliente/excluir/{id}', 'ClienteController@excluir')->name('cliente_delete');

Route::get('/vendas/Cliente/{id}', 'VendaController@vendasPorCliente')->name('vendas_cliente');

Route::get('/venda/cadastro', 'VendaController@telaCadastro')->name('venda_cad');

Route::post('/venda/adicionar', 'VendaController@adicionar')->name('venda_add');

Route::get('/venda/listar', 'VendaController@listarVendas')->name('listar_vendas');
