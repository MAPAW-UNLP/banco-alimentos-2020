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
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificacionAceptacionController;
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
Route::get('/combos/solicitar', [ComboController::class, 'solicitar']);
Route::get('/encuestaOrganizacion', [PagesController::class, 'encuesta_organizacion']);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/pdf', [PedidoController::class, 'pdf']);
    Route::get('/aceptarOrg/{id}', [OrganizacioneController::class, 'aceptar']);
    Route::get('/combos/solicitar', [ComboController::class, 'solicitar']);
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('combos', 'ComboController');
    Route::get('/combos/ver/{id}', [ComboController::class, 'ver']);
    Route::get('/combos/solicitar/{user}', [ComboController::class, 'solicitar']);
    Route::get('/combos/calendar/{idcombo}', [ComboController::class, 'calendar']);
    Route::post('/organizacion/busqueda', [OrganizacioneController::class, 'busqueda']);
    Route::resource('organizaciones', 'OrganizacioneController');
    Route::resource('pedidos', 'PedidoController');
    Route::resource('rols', 'RolController');
    Route::resource('turnos', 'TurnoController');
    Route::resource('solicitudes', 'SolicitudController');
    Route::resource('modificaciones', 'ModificacioneController');
    Route::resource('notificaciones', 'NotificacionController');
    Route::resource('notificacionAceptacion', 'NotificacionAceptacionController');
    Route::get('/readDataOrg/{id}', [OrganizacioneController::class, 'show']);
    Route::post('/asignarId', [OrganizacioneController::class, 'asignarId']);
    Route::post('/rechazar', [RechazoController::class, 'store']);
    Route::get('/activarCombo/{id}', [ComboController::class, 'activar']);
    Route::get('/desactivarCombo/{id}', [ComboController::class, 'desactivar']);
    Route::get('/addUser', [PagesController::class, 'add_user']);
    Route::get('/changePassword', [PagesController::class, 'change_password']);
    Route::post('/changePassword', [UserController::class, 'updatePassword']);
    Route::get('/aceptarModificacion/{id}', [ModificacioneController::class, 'aceptar']);
    Route::get('/cancelarModificacion/{id}', [ModificacioneController::class, 'cancelar']);
    Route::get('/cambiarEstado/{id}', [ComboController::class, 'cambiarEstado']);
    Route::get('/cambiarOrga/{id}', [OrganizacioneController::class, 'cambiarEstado']);
    Route::get('/turnos/ver/{fecha}', [TurnoController::class, 'index']);
    Route::get('/calendar', [TurnoController::class, 'index']);
    Route::get('/estadoSolicitud', [PedidoController::class, 'estado_solicitud_indexCombo']);
    Route::get('/estadoSolicitud/indexDatos', [SolicitudController::class, 'solicitudOrganizacion']);
    Route::get('/estadoSolicitud/solicitudDatos/{id}', [SolicitudController::class, 'estado_solicitud_datos']);
    Route::get('/estadoSolicitud/solicitudCombos/{id}', [ComboController::class, 'estado_solicitud_combos']);
    Route::get('organizacione/edit/{id}', [OrganizacioneController::class, 'edit']);
    Route::get('organizacione/edit-short/{id}', [OrganizacioneController::class, 'edit_short']);
    Route::get('organizacione/show/{id}', [OrganizacioneController::class, 'show_organizacion']);
    Route::get('/notificacionPorAceptacion', [NotificacionAceptacionController::class, 'index']);
    Route::post('/editShort', [OrganizacioneController::class, 'updateShort']);
    Route::get('/getmsg/{fecha}', [TurnoController::class, 'horarios']);
});
Route::post('/aceptarTerminos', [MailController::class, 'aceptarTerminos']);
Route::post('/resetPass', [MailController::class, 'resetPass']);
Route::get('/terminos', [OrganizacioneController::class, 'terminos']);
Route::get('/registro', [OrganizacioneController::class, 'registro']);
Route::post('/registro', [SolicitudController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


