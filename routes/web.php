<?php

use App\Http\Controllers\UsersController;
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


Route::get('/', function () {
    return view('welcome');
});
*/

Route::controller(UsersController::class)->group(function(){

    Route:: get('/', 'Index')->name('usuario.index');
    Route:: get('/users', 'Index')->name('usuario.index');

    Route:: get('/criar','create') ->name('usuario.create');

    Route:: post('/criar/salvar','store')->name('usuario.stores');

    
});

