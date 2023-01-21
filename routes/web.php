<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accounts\AccountsController;
use App\Http\Controllers\auth\AuthenticationController;



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

Route::get('/auth/login', [AuthenticationController::class, 'logpage'])->name('loginPage');
Route::post('/check', [AuthenticationController::class, 'checkauth'])->name('authenticate');


Route::group(['prefix' => 'accounts','middleware' => ['isloggedin']], function() {

    Route::get('/', [AccountsController::class, 'index'])->name('AccountsHome');
    Route::get('/ClientsList', [AccountsController::class, 'clients_list'])->name('clientslist');
    Route::get('/NewClientRegister', [AccountsController::class, 'newclientregister'])->name('registernewclient');
    Route::get('/LoanedClientsList', [AccountsController::class, 'loaned_list'])->name('loanedclientslist');
    Route::get('/tables', [AccountsController::class, 'tables'])->name('AccountsTables');

    //logout
    Route::get('/accounts/logout', [AuthenticationController::class, 'logout'])->name('signout');

    Route::get('/blank', [AccountsController::class, 'blank'])->name('Accountsblank');
    Route::get('/forms', [AccountsController::class, 'forms'])->name('Accountsform');

    
    Route::get('/patients', [AccountsController::class, 'PatientsList'])->name('PatientsList');
   
    }
    );