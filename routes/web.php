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
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/logout', [LoginController::class, 'logout']);
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
    Route::get('/readDataOrg/{id}', [OrganizacioneController::class, 'show']);
    Route::post('/rechazar', [RechazoController::class, 'store']);
    Route::get('/activarCombo/{id}', [ComboController::class, 'activar']);
    Route::get('/desactivarCombo/{id}', [ComboController::class, 'desactivar']);
    Route::get('/addUser', [PagesController::class, 'add_user']);
    Route::get('/changePassword', [PagesController::class, 'change_password']);
    Route::post('/changePassword', [UserController::class, 'updatePassword']);
    Route::get('/aceptarModificacion/{id}', [ModificacioneController::class, 'aceptar']);
    Route::get('/cancelarModificacion/{id}', [ModificacioneController::class, 'cancelar']);
    Route::get('/cambiarEstado/{id}', [ComboController::class, 'cambiarEstado']);
    Route::get('/calendar', [PagesController::class, 'calendar']);
    Route::get('/notificaciones', [PagesController::class, 'notificaciones']);
    Route::get('/cambiarOrga/{id}', [OrganizacioneController::class, 'cambiarEstado']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
