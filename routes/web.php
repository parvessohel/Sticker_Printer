<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::resource('customers', CustomerController::class);

Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');


// Edit customer
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// Update customer (used when submitting the edit form)
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

// Delete customer
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');



Route::get('/', function () {
    return view('welcome');
});
