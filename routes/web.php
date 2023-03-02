<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');


Route::get('/carrinho', [CarrinhoController::class, 'cart_list'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'add_itens_cart'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCart'])->name('site.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'refreshCart'])->name('site.atualizacarrinho');
Route::get('/clear', [CarrinhoController::class, 'clearCart'])->name('site.clearcarrinho');
Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['checkemail']);
