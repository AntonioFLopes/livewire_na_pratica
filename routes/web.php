<?php

use App\Http\Livewire\Expense\ExpenseCreate;
use App\Http\Livewire\Expense\ExpenseList;
use App\Http\Livewire\Expense\ExpenseEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('expenses')->name('expenses')->group(function() {
        Route::get('/create', ExpenseCreate::class)->name('.create');
        Route::get('/edit/{expense}', ExpenseEdit::class)->name('.edit');
        Route::get('/list', ExpenseList::class)->name('.list');
    });
});
