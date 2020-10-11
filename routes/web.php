<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ComboController;

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

Route::get('/combos', [ComboController::class, 'index']);

