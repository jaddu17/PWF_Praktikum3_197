<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        'role' => 'user', // default role
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Product Routes (Accessible by all logged in users)
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // Category Routes (Admin Only via Gate)
    Route::middleware('can:manage-product')->group(function () { 
    // Mengelompokkan semua route dengan middleware 'can:manage-product'
    // Artinya: hanya user yang punya permission 'manage-product' yang bisa akses

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index'); 
    // GET /category → menampilkan daftar category (halaman index)

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create'); 
    // GET /category/create → menampilkan form tambah category

    Route::post('/category', [CategoryController::class, 'store'])->name('category.store'); 
    // POST /category → menyimpan data category baru ke database

    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit'); 
    // GET /category/{id}/edit → menampilkan form edit category
    // {category} otomatis di-bind ke model (Route Model Binding)

    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update'); 
    // PUT /category/{id} → update data category di database

    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy'); 
    // DELETE /category/{id} → hapus category dari database

    }); 
    // Penutup group middleware
});
