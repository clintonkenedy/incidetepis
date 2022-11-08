<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\RolController;
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
    return redirect()->route('helpdesk');
});

//Auth::routes(['register' => false]);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('tickets',TicketController::class);

Route::get('/helpdesk', [TicketController::class, 'index'])->name('helpdesk');

Route::get('/verificacion', [TicketController::class, 'passOfi'])->name('ticket.passOfi');

Route::post('/nuevoticket', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/prueba', [TicketController::class, 'create'])->name('prueba');


Route::group(['middleware'=>['auth']],function(){
    Route::view('dashboard','dashboard')->name('dashboard');

    Route::get('/tickets/pendientes', [TicketController::class, 'ticketsPendientes'])->name('tickets.pendientes');

    Route::get('/tickets/solucionados', [TicketController::class, 'ticketsSolucionado'])->name('tickets.solucionados');

    Route::get('/tickets/cancelados', [TicketController::class, 'ticketsCancelado'])->name('tickets.cancelados');

    Route::get('/tickets/edit/{id}', [TicketController::class,'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketController::class,'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{id}', [TicketController::class,'destroy'])->name('tickets.destroy');

    Route::resource('usuarios',UsuarioController::class);
    Route::resource('oficinas', OficinaController::class)->names('oficinas');
    Route::resource('roles',RolController::class);
});
