<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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

// Route::get('/welcome', function(){
//     return response(view('welcome'),200);
//     // ->header('Content-Type', 'text/html')
//     // ->header('Super-Developer', 'Bob Mike');
// });

Route::get('/', function () {
    return view('welcome');
});




Route::resource('contact', ContactsController::class);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\ContactsController::class, 'index'])->name('dashboard')->middleware('auth');

Route::post('/contact/create', [App\Http\Controllers\ContactsController::class, 'create'])->middleware('auth');

Route::post('/contact/store', [App\Http\Controllers\ContactsController::class, 'store'])->middleware('auth');


