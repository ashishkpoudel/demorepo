<?php

use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'getAll'])->name('users.getAll');
Route::post('users', [UserController::class, 'create'])->name('users.create');
Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'delete'])->name('users.delete');
Route::get('me', [UserController::class, 'me'])->name('users.me');
Route::post('users/{user}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
Route::delete('users/{user}/suspend', [UserController::class, 'unsuspend'])->name('users.unsuspend');
