<?php

use App\Http\Controllers\DashboardController;
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
    }
);
