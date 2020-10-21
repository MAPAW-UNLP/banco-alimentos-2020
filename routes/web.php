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
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModificacioneController;

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
Auth::routes();
Route::get('/', [PagesController::class, 'inicio']);
Route::get('/login', [PagesController::class, 'iniciar_sesion']);
Route::get('/recover', [PagesController::class, 'recover_password']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('combos', 'ComboController');
    Route::resource('organizaciones', 'OrganizacioneController');
    Route::resource('pedidos', 'PedidoController');
    Route::resource('rols', 'RolController');
    Route::resource('turnos', 'TurnoController');
    Route::resource('solicitudes', 'SolicitudController');
    Route::resource('modificaciones', 'ModificacioneController');
    Route::get('/aceptarOrg/{id}', [OrganizacioneController::class, 'aceptar']);
    Route::get('/rechazar/{id}', [RechazoController::class, 'create']);
    Route::get('/activarCombo/{id}', [ComboController::class, 'activar']);
    Route::get('/desactivarCombo/{id}', [ComboController::class, 'desactivar']);
    Route::get('/addUser', [PagesController::class, 'add_user']);
    Route::get('/changePassword', [PagesController::class, 'change_password']);
    Route::post('/changePassword', [UserController::class, 'updatePassword']);
    Route::get('/aceptarModificacion/{id}', [ModificacioneController::class, 'aceptar']);
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');