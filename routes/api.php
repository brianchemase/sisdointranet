<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoaningController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/my-models', 'MyController@index');
Route::get('/clients', [LoaningController::class, 'clients_data_api']);

//Route::get('/clientsLoanBalance', [LoaningController::class, 'loan_balance']);

Route::get('/clientsLoanBalance/{id}', [LoaningController::class, 'loan_balance']);


