<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Tables\Users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard',[
                'users' => Users::class
            ]);
        })->middleware(['verified'])->name('dashboard');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/users',[UserController::class,'index'])->name('users');
        Route::get('/customers',[CustomerController::class,'index'])->name('customers');
        Route::post('/customers/store',[CustomerController::class,'store'])->name('customers.store');
        Route::delete('/customers/delete/{customer}',[CustomerController::class,'delete'])->name('customers.delete');
        Route::get('/customers/edit/{customer}',[CustomerController::class,'edit'])->name('customers.edit');
        Route::delete('/users/delete/{user}',[UserController::class,'delete'])->name('users.delete');
        Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('users.edit');
    });

    require __DIR__.'/auth.php';
});
