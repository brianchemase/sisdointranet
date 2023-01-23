<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accounts\AccountsController;
use App\Http\Controllers\PDFController;
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

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::post('/loanstatementsreport', [AccountsController::class, 'client_statement'])->name('loanstatementsreport');


Route::group(['prefix' => 'accounts','middleware' => ['isloggedin']], function() {

    Route::get('/', [AccountsController::class, 'index'])->name('AccountsHome');
    Route::get('/ClientsList', [AccountsController::class, 'clients_list'])->name('clientslist');
    //client registration
    Route::get('/NewClientRegister', [AccountsController::class, 'newclientregister'])->name('registernewclient');
    Route::post('/SaveClient', [AccountsController::class, 'savenewclient'])->name('saveclientdata');



    Route::get('/LoanedClientsList', [AccountsController::class, 'loaned_list'])->name('loanedclientslist');
    Route::get('/loansearch', [AccountsController::class, 'loan_repayment'])->name('loanrepaymentsearch');
    Route::post('/RegisterLoanPayment', [AccountsController::class, 'register_loan_repayment'])->name('registerrepayment');
    Route::get('/LoanStatementPage', [AccountsController::class, 'search_statement'])->name('loanstatements');

    
    Route::get('/tables', [AccountsController::class, 'tables'])->name('AccountsTables');

    //logout
    Route::get('/accounts/logout', [AuthenticationController::class, 'logout'])->name('signout');

    Route::get('/blank', [AccountsController::class, 'blank'])->name('Accountsblank');
    Route::get('/forms', [AccountsController::class, 'forms'])->name('Accountsform');

    
    Route::get('/patients', [AccountsController::class, 'PatientsList'])->name('PatientsList');
   
    }
    );