<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
//user routes with frontend
Route::get('user/dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth', 'role:user'])->name('user.dashboard');
// seller routes
Route::get('seller/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth', 'role:seller'])->name('seller.dashboard');
// admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('food-categories', App\Http\Controllers\FoodCategoryController::class);
    Route::resource('restaurant-categories', App\Http\Controllers\RestaurantCategoryController::class);
    Route::resource('discount', App\Http\Controllers\DiscountController::class);
    Route::resource('banner', App\Http\Controllers\BannerController::class);

});



require __DIR__ . '/auth.php';
