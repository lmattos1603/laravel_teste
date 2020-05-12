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

Route::middleware(['auth'])->group(function(){

	Route::middleware(['eh_admin'])->group(function(){
		/* Cliente */
		Route::get('/cliente/buscar/{id}', 'ClienteController@telaAlteracao')->name('cliente_update');

		Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')->name('cliente_alt');

		Route::get('/cliente/excluir/{id}', 'ClienteController@excluir')->name('cliente_delete');

		Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('cliente_cad');

		Route::post('/cliente/adicionar', 'ClienteController@adicionar')->name('cliente_add');

		/* Venda */
		Route::get('/venda/{id}/cadastro_itens', 'VendaController@telaAdicionarItem')->name('cadastro_itens');

		Route::post('/venda/{id}/adicionar_itens', 'VendaController@adicionarItem')->name('add_itens');

		Route::get('/venda/{id}/remover_itens/{id_pivot}', 'VendaController@excluirItem')->name('delete_itens');

		/* Produto */
		Route::get('/produto/cadastro', 'ProdutoController@telaCadastroProduto')->name('produto_cad');

		Route::post('/produto/adicionar', 'ProdutoController@cadastroProduto')->name('produto_add');
	});

	Route::get('/', function(){return view('home');});
	Route::get('/home', 'HomeController@index')->name('home');

	/* Cliente */
	
	Route::get('/cliente/listar', 'ClienteController@listar')->name('listar');

	/* Venda */
	Route::get('/vendas/Cliente/{id}', 'VendaController@vendasPorCliente')->name('vendas_cliente');

	Route::get('/venda/cadastro', 'VendaController@telaCadastro')->name('venda_cad');

	Route::post('/venda/adicionar', 'VendaController@adicionar')->name('venda_add');

	Route::get('/venda/listar', 'VendaController@listarVendas')->name('listar_vendas');
	
	/* Produto */
	Route::get('/produto/{id}/listar', 'VendaController@listarProdutos')->name('listar_produtos');
});



Route::get('/cliente/logar', 'ClienteController@logar')->name('login');

Route::post('/cliente/login', 'ClienteController@login')->name('logar');

Route::get('/cliente/logout', 'ClienteController@logout')->name('logout');

Auth::routes();
