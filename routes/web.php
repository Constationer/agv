<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAccountController;
use App\Http\Controllers\DataCurrenciesController;
use App\Http\Controllers\DataCustomerController;
use App\Http\Controllers\PettyCashController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('master')->group(
    function () {
        Route::get('/pettycash', [PettyCashController::class, 'index'])->name('pettycash.index');
        Route::get('/data_pettycash', [PettyCashController::class, 'dataGet'])->name('pettycash.dataGet');
        Route::get('/pettycash/create', [PettyCashController::class, 'create'])->name('pettycash.create');
        Route::post('/pettycash', [PettyCashController::class, 'store'])->name('pettycash.store');
        Route::get('/pettycash/edit/{id}', [PettyCashController::class, 'edit'])->name('pettycash.edit');
        Route::post('/pettycash/update/{id}', [PettyCashController::class, 'update'])->name('pettycash.update');
        Route::delete('/pettycash/delete/{id}', [PettyCashController::class, 'delete'])->name('pettycash.delete');
    }
);

Route::prefix('data-master')->group(
    function () {
        //Data Customer
        Route::get('/datacustomer', [DataCustomerController::class, 'index'])->name('datacustomer.index');
        Route::get('/datacustomer/getData', [DataCustomerController::class, 'getData'])->name('datacustomer.getData');
        Route::post('/datacustomer', [DataCustomerController::class, 'store'])->name('datacustomer.store');
        Route::get('/pettycash/edit/{id}', [DataCustomerController::class, 'edit'])->name('pettycash.edit');
        Route::post('/pettycash/update/{id}', [DataCustomerController::class, 'update'])->name('pettycash.update');
        Route::delete('/pettycash/delete/{id}', [DataCustomerController::class, 'delete'])->name('pettycash.delete');

        //Data Currency
        Route::get('/currency', [DataCurrenciesController::class, 'index'])->name('datacurrency.index');
        Route::get('/currency/getData', [DataCurrenciesController::class, 'getData'])->name('datacurrency.getData');
        Route::post('/currency', [DataCurrenciesController::class, 'store'])->name('datacurrency.store');
        Route::get('/currency/edit/{id}', [DataCurrenciesController::class, 'edit'])->name('datacurrency.edit');
        Route::post('/currency/update/{id}', [DataCurrenciesController::class, 'update'])->name('datacurrency.update');
        Route::delete('/currency/delete/{id}', [DataCurrenciesController::class, 'delete'])->name('datacurrency.delete');

        //Data Account
        Route::get('/account', [DataAccountController::class, 'index'])->name('dataaccount.index');
        Route::get('/account/getData', [DataAccountController::class, 'getData'])->name('dataaccount.getData');
        Route::post('/account', [DataAccountController::class, 'store'])->name('dataaccount.store');
        Route::get('/account/edit/{id}', [DataAccountController::class, 'edit'])->name('dataaccount.edit');
        Route::post('/account/update/{id}', [DataAccountController::class, 'update'])->name('dataaccount.update');
        Route::delete('/account/delete/{id}', [DataAccountController::class, 'delete'])->name('dataaccount.delete');
    }
);
