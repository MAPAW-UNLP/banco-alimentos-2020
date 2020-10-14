<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\OrganizacioneController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RechazoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UsuariosController;

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

Route::get('/', [PagesController::class, 'inicio']);

Route::get('/login', [PagesController::class, 'iniciar_sesion']);

Route::get('/recover', [PagesController::class, 'recover_password']);

Route::get('/addUser', [PagesController::class, 'add_user']);

Route::get('/changePassword', [PagesController::class, 'change_password']);

Route::get('/manageSocialArea', [PagesController::class, 'manage_social_area']);

Route::resource('combos', 'ComboController');
Route::resource('organizaciones', 'OrganizacioneController');
Route::resource('pedidos', 'PedidoController');
Route::resource('rechazos', 'RechazoController');
Route::resource('rols', 'RolController');
Route::resource('turnos', 'TurnoController');
Route::resource('usuarios', 'UsuariosController');



