<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('tickets',TicketController::class);

Route::get('/helpdesk', [TicketController::class, 'index'])->name('helpdesk');

Route::post('/nuevoticket1', [TicketController::class, 'passOfi'])->name('ticket.passOfi');
Route::post('/nuevoticket2', [TicketController::class, 'store'])->name('ticket.store');


Route::group(['middleware'=>['auth']],function(){
    Route::view('dashboard','dashboard')->name('dashboard');

    Route::get('/tickets/pendientes', [TicketController::class, 'ticketsPendientes'])->name('tickets.pendientes');

    Route::get('/tickets/solucionados', [TicketController::class, 'ticketsSolucionado'])->name('tickets.solucionados');

    Route::get('/tickets/cancelados', [TicketController::class, 'ticketsCancelado'])->name('tickets.cancelados');
});
