<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accounts\AccountsController;



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
    return view('page');
});

Route::group(['prefix' => 'accounts'], function() {

    Route::get('/', [AccountsController::class, 'index'])->name('AccountsHome');
    
    Route::get('/patients', [AccountsController::class, 'PatientsList'])->name('PatientsList');
   
    }
    );