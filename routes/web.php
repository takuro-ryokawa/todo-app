<?php

use App\Http\Controllers\TodoListIndexController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('lists.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/lists', [TodoListIndexController::class, 'index'])->name('lists.index');
    Route::post('/lists', [TodoListIndexController::class, 'store'])->name('lists.store');
    Route::patch('/lists/{index}', [TodoListIndexController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{index}', [TodoListIndexController::class, 'destroy'])->name('lists.destroy');
    Route::get('/lists/{index}/todos', [TodoListController::class, 'index'])->name('todos.index');
    Route::post('/lists/{index}/todos', [TodoListController::class, 'store'])->name('todos.store');
    Route::patch('/todos/{todo}', [TodoListController::class, 'update'])->name('todos.update');
    Route::post('/todos/{todo}/toggle', [TodoListController::class, 'toggle'])->name('todos.toggle');
    Route::delete('/todos/{todo}', [TodoListController::class, 'destroy'])->name('todos.destroy');
});

require __DIR__.'/auth.php';
