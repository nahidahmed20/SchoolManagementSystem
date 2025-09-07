<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class,'store'])->name('permission.store');
    Route::get('/permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

require __DIR__.'/auth.php';
