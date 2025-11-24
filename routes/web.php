<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return redirect()->route('lists.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/lists', [TodoListController::class, 'index'])->name('lists.index');
    Route::post('/lists', [TodoListController::class, 'store'])->name('lists.store');
    Route::patch('/lists/{list}', [TodoListController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{list}', [TodoListController::class, 'destroy'])->name('lists.destroy');
    Route::get('/lists/{list}/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/lists/{list}/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::post('/todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
});

require __DIR__.'/auth.php';
