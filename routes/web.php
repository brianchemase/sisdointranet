<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accounts\AccountsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\LoaningController;
use App\Http\Controllers\StaffManagementController;
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
Route::get('ClientProfile', [PDFController::class, 'client_profile']);

Route::get('/aging_report', [LoaningController::class, 'generate_aging_report']);
Route::get('/client_aging_report', [LoaningController::class, 'generate_client_aging_report']);



Route::group(['prefix' => 'accounts','middleware' => ['isloggedin']], function() {

    Route::get('/', [AccountsController::class, 'index'])->name('AccountsHome');
    Route::get('/ClientsList', [AccountsController::class, 'clients_list'])->name('clientslist');
    //client registration
    Route::get('/NewClientRegister', [AccountsController::class, 'newclientregister'])->name('registernewclient');
    Route::post('/SaveClient', [AccountsController::class, 'savenewclient'])->name('saveclientdata');



    Route::get('/LoanedClientsList', [AccountsController::class, 'loaned_list'])->name('loanedclientslist');

    Route::get('/RunningLoanedClientsList', [LoaningController::class, 'running_loans'])->name('runningloanedclientslist');// running loans
    Route::get('/PendingLoanList', [AccountsController::class, 'pending_loan_list'])->name('pendingloanlist');
    //for repayments
    Route::get('/LoanedClients', [AccountsController::class, 'loaned_clients_data'])->name('LoanedClients');

    Route::get('/loansearch', [AccountsController::class, 'loan_repayment'])->name('loanrepaymentsearch');//searching data
    Route::get('/loanfindsearch', [LoaningController::class, 'search_entry'])->name('findloanrepaymentsearch');//searching data
    Route::post('/RegisterLoanPayment', [AccountsController::class, 'register_loan_repayment'])->name('registerrepayment');
    Route::get('/LoanStatementPage', [AccountsController::class, 'search_statement'])->name('loanstatements');
    Route::post('/loanstatementsreport', [AccountsController::class, 'client_statement'])->name('loanstatementsreport');

    Route::get('/tables', [AccountsController::class, 'tables'])->name('AccountsTables');

    //users tables
    Route::get('/Sisdostafflist', [StaffManagementController::class, 'staff_list'])->name('ActiveStaffList');

    //historylogs tables
    Route::get('/LogsData', [StaffManagementController::class, 'history_logs'])->name('historylogsdata');

    //deman letters
    Route::get('/DemandLetter', [AccountsController::class, 'demand_letter_generation'])->name('DemandLetter');
    Route::post('/GenerateDemandLetter', [AccountsController::class, 'generate_demand_letter'])->name('makeDemandLetter');

    Route::get('/DemandLetterPage', [AccountsController::class, 'demand_letter_page'])->name('DemandLetterPage');//page

    // loaning process
    Route::get('/ValidateClient', [LoaningController::class, 'confirm_client'])->name('clientcheck');//check if client is registered
    Route::post('/clientvalidationcheck', [LoaningController::class, 'client_validation'])->name('clientvalidation');

    //loan application
    Route::get('/LoanApplicationForm', [LoaningController::class, 'loan_application_form'])->name('loanapplicationform');
    Route::post('/SaveLoanApplication', [LoaningController::class, 'register_loan_application'])->name('saveloanapplication');//registration of a loan

    //loan repayments summary
    Route::get('/MonthlyLoanRepayments', [LoaningController::class, 'loan_repayments_summary'])->name('monthlyrepayments');
    //loan disbusment summary
    Route::get('/MonthlyLoandisbusments', [LoaningController::class, 'loan_disbusment_summary'])->name('monthlyloandisbusments');
    // monthly loan repayments
    Route::get('/MonthlyLoanRepaymentList', [LoaningController::class, 'monthly_loan_repayments'])->name('monthlyloanrepaymentlist');// running loans

    //logout
    Route::get('/accounts/logout', [AuthenticationController::class, 'logout'])->name('signout');

    Route::get('/blank', [AccountsController::class, 'blank'])->name('Accountsblank');
    Route::get('/forms', [AccountsController::class, 'forms'])->name('Accountsform');

    
    Route::get('/patients', [AccountsController::class, 'PatientsList'])->name('PatientsList');
   
    }
    );