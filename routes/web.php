<?php

use App\Http\Livewire\Expense\ExpenseCreate;
use App\Http\Livewire\Expense\ExpenseList;
use App\Http\Livewire\Expense\ExpenseEdit;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('expenses')->name('expenses')->group(function () {
        Route::get('/create', ExpenseCreate::class)->name('.create');
        Route::get('/edit/{expense}', ExpenseEdit::class)->name('.edit');
        Route::get('/list', ExpenseList::class)->name('.list');

        Route::get('/{expense}/photo', function ($expense) {
            $expense = auth()->user()->expenses()->findOrFail($expense);

            // Pegar a Imagem
            if (!Storage::disk('public')->exists($expense->photo))
                return abort(404, 'Image Not Found!');
            $image = Storage::disk('public')->get($expense->photo);
            //Retornar ela como imagem
            $mimeType = File::mimeType(storage_path('app/public/' . $expense->photo));

            return response($image)->header('Content-Type', $mimeType);
        })->name('.photo');
    });
});
