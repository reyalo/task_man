<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['web'])->group(function () {

//     Route::get('/task/manage', [TaskController::class, 'index'])->name('manageTask');
//     Route::get('/task/add', [TaskController::class, 'create'])->name('addTask');
//     Route::post('/task/store', [TaskController::class, 'store'])->name('storeTask');
//     Route::get('/task/active/{id}', [TaskController::class, 'active'])->name('activeTask');
//     Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('editTask');
//     Route::get('/task/show/{id}', [TaskController::class, 'show'])->name('showTask');
//     Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('updateTask');
//     // Route::post('/task/update', [TaskController::class, 'update'])->name('updateTask');
//     Route::get('/task/delete/{id}', [TaskController::class, 'destroy'])->name('deleteTask');

// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        // return view('frontend.master');
        return view('frontend.home.index');
    })->name('home');

    Route::get('/task/manage', [TaskController::class, 'index'])->name('manageTask');
    Route::get('/task/add', [TaskController::class, 'create'])->name('addTask');
    Route::post('/task/store', [TaskController::class, 'store'])->name('storeTask');
    Route::get('/task/active/{id}', [TaskController::class, 'active'])->name('activeTask');
    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('editTask');
    Route::get('/task/show/{id}', [TaskController::class, 'show'])->name('showTask');
    Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('updateTask');
    // Route::post('/task/update', [TaskController::class, 'update'])->name('updateTask');
    Route::get('/task/delete/{id}', [TaskController::class, 'destroy'])->name('deleteTask');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
