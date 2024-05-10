<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PenggunaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user', 'verified'])->name('dashboard');

Route::prefix('/pengguna/barang')->group(function(){
    Route::get("/", [PenggunaController::class, "showDataBarang"]);
    Route::post("/store", [PenggunaController::class, "storeDataBarang"]);
    Route::post("/update/{id}", [PenggunaController::class, "updateDataItem"]);
    Route::get("/destroy/{id}", [PenggunaController::class, "destroyDataItem"]);
});

Route::prefix('/pengguna/category')->group(function(){
    Route::get("/", [PenggunaController::class, "showDataCategory"]);
    Route::post("/store", [PenggunaController::class, "storeDataCategory"]);
    Route::post("/update/{id}", [PenggunaController::class, "updateDataCategory"]);
    Route::get("/destroy/{id}", [PenggunaController::class, "destroyDataCategory"]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function(){
    return view('admin.dashboard');
})->middleware(['auth', 'admin']);

Route::prefix('/admin/barang')->group(function(){
    Route::get("/", [AdminController::class, "showDataBarang"]);
    Route::post("/store", [AdminController::class, "storeDataBarang"]);
    Route::post("/update/{id}", [AdminController::class, "updateDataItem"]);
    Route::get("/destroy/{id}", [AdminController::class, "destroyDataItem"]);
});

Route::prefix('/admin/category')->group(function(){
    Route::get("/", [AdminController::class, "showDataCategory"]);
    Route::post("/store", [AdminController::class, "storeDataCategory"]);
    Route::post("/update/{id}", [AdminController::class, "updateDataCategory"]);
    Route::get("/destroy/{id}", [AdminController::class, "destroyDataCategory"]);
});


Route::get('/approval', function(){
    return view('approval.dashboard');
})->middleware(['auth', 'approval']);

Route::prefix('/approval/barang')->group(function(){
    Route::get("/", [ApprovalController::class, "showDataBarang"]);
    Route::post("/store", [ApprovalController::class, "storeDataBarang"]);
    Route::post("/approve/{id}", [ApprovalController::class, "approveData"]);
    Route::post("/reject/{id}", [ApprovalController::class, "rejectData"]);
});

require __DIR__.'/auth.php';
