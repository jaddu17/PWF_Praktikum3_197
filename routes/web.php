<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/product');
});

Route::get('/login', function () {
    return '
        <div style="font-family: sans-serif; text-align: center; margin-top: 50px;">
            <h2>Simulasi Login (Tanpa Password)</h2>
            <p>Klik pengguna berikut ini untuk mensimulasikan login:</p>
            <a href="/login-admin" style="display:inline-block; padding:10px 20px; background:indigo; color:white; border-radius:5px; text-decoration:none; margin:10px">Login sbg Admin</a>
            <a href="/login-user" style="display:inline-block; padding:10px 20px; background:gray; color:white; border-radius:5px; text-decoration:none; margin:10px">Login sbg User</a>
        </div>
    ';
})->name('login');

Route::get('/login-admin', function () {
    \Illuminate\Support\Facades\Auth::loginUsingId(1);
    return redirect('/product');
});

Route::get('/login-user', function () {
    \Illuminate\Support\Facades\Auth::loginUsingId(2);
    return redirect('/product');
});

Route::middleware('auth')->group(function () {
    // Product Page
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // Secure Kategori route using the manage-product gate
    Route::get('/kategori', function () {
        return 'Kategori Page (Admin Only)';
    })->name('kategori.index')->middleware('can:manage-product');
});
