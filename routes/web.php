<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;

use App\Http\Middleware\authenticateUser;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');




Route::resource('trial', NoteController::class);

Route::middleware('authUser')->group(function () {
    Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('/note', [NoteController::class, 'store'])->name('note.store');
    Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
    Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/note/{id}',[NoteController::class, 'delete'])->name('note.delete');
    Route::get('/note', [NoteController::class, 'index'])->name('note.index');   
 
});

/*Route::middleware('guest')->group(function () {
    // Define routes accessible by guests here
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.show');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
