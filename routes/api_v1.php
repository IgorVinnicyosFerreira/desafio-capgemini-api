<?php


use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'V1\AuthController@login')->name("login");
Route::middleware('auth:sanctum')->post('/logout', 'V1\AuthController@logout')->name("logout");


Route::prefix('/current-accounts')->middleware('auth:sanctum')->group(function () {
    Route::get('/balance', 'V1\CurrentAccountController@getBalance')->name("current_account.balance");
    Route::patch('/deposit', 'V1\CurrentAccountController@deposit')->name("current_account.deposit");
    Route::patch('/withdraw', 'V1\CurrentAccountController@withdraw')->name("current_account.withdraw");
    Route::get('/transactions', 'V1\BankTransactionController@index')->name("current_account.transactions");
});
