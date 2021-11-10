<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\SuplementacaoController;
use App\Http\Controllers\VestuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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



Route::get('/',[TestController::class, 'home']);

Route::get('/home',[TestController::class, 'home']);


Route::get('/info',[TestController::class, 'info']);
Route::get('/admin',[TestController::class, 'admin']);

Route::get('/vestuarios',[VestuarioController::class, 'index']);
Route::get('/suplementos',[SuplementacaoController::class,'index']);
Route::get('/users',[UtilizadorController::class, 'index']);

Route::get('/registo',[UtilizadorController::class, 'create']);
Route::get('/login',[TestController::class, 'login']);
Route::post('/registo',[UtilizadorController::class, 'store']);
Route::post('/login',[UtilizadorController::class,'validar_login']);

Route::get('/adminCreateSuple',[SuplementacaoController::class,'create']);
Route::post('/adminCreateSuple',[SuplementacaoController::class,'store']);
Route::get('/usersHome',[TestController::class ,'userHome']);

Route::get('/adminCreateVest',[VestuarioController::class,'create']);
Route::post('/adminCreateVest',[VestuarioController::class, 'store']);

Route::get('/userSuplementacao',[SuplementacaoController::class,'proteina']);
Route::get('/userDesenvolvimentoMuscular',[SuplementacaoController::class,'desenvolvimento']);
Route::get('/userEnergia',[SuplementacaoController::class,'energia']);
Route::get('/userVestuario',[VestuarioController::class,'vestuario']);
Route::get('/userMalas',[VestuarioController::class,'malas']);
Route::get('/ClientPessoa',[UtilizadorController::class,'showinfo']);

Route::get('/FormsEditarSuple',[SuplementacaoController::class,'indexedit']);
Route::get('/EditSuple/{suplementacao}',[SuplementacaoController::class,'edit']);
Route::post('/EditSuple/{suplementacao}',[SuplementacaoController::class,'update']);
Route::post('/DeleteSuple/{suplementacao}',[SuplementacaoController::class,'destroy']);

Route::get('/FormsEditarVest',[VestuarioController::class,'indexedit']);
Route::get('/EditVest/{vestuario}',[VestuarioController::class,'edit']);
Route::post('/EditVest/{vestuario}',[VestuarioController::class,'update']);
Route::post('/DeleteVest/{vestuario}',[VestuarioController::class,'destroy']);
Route::get('session/get',[UtilizadorController::class,'accessSessionData']);
Route::get('/session/remove',[UtilizadorController::class,'deleteSession']);
Route::get('/orders',[OrderController::class,'index']);
Route::get('/clientOrders',[OrderController::class,'clientorders']);
Route::get('/clientinfo',[UtilizadorController::class,'showinfo']);


Route::get('/cart',[CartController::class,'cart']);
Route::post('/cartStore',[CartController::class,'add']);
Route::post('//cartupdate', [CartController::class,'update']);
Route::post('//cartdelete', [CartController::class,'remove']);
Route::post('/cartclear',[CartController::class,'clear']);

Route::get('/checkout',[CartController::class,'checkout']);
Route::post('/checkout',[CartController::class,'sendemail']);

Route::get('/mail',[CartController::class,'showmail']);