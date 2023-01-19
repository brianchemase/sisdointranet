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
    Route::get('/tables', [AccountsController::class, 'tables'])->name('AccountsTables');

    Route::get('/blank', [AccountsController::class, 'blank'])->name('Accountsblank');
    Route::get('/forms', [AccountsController::class, 'forms'])->name('Accountsform');

    
    Route::get('/patients', [AccountsController::class, 'PatientsList'])->name('PatientsList');
   
    }
    );