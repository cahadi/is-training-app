<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/grades', function(){
    return view('frontend.pages.grades');
});

Route::get('/lessons', function(){
    return view('frontend.pages.lessons');
});

Route::prefix('/activity')->group(function (){});
Route::prefix('/answer')->group(function (){});
Route::prefix('/grade')->group(function (){});
Route::prefix('/lesson')->group(function (){});
Route::prefix('/role')->group(function (){});
Route::prefix('/subject')->group(function (){});
Route::prefix('/topic')->group(function (){});
Route::prefix('/type')->group(function (){});
Route::prefix('/user')->group(function (){});

Route::get('/dashboard', function () {
    return view('dashboard');
})/*->middleware(['auth', 'verified'])->name('dashboard')*/;
/*
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('frontend.pages.main');
    });

    Route::get('/grades', function(){
        return view('frontend.pages.grades');
    });*/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
/*});*/

require __DIR__.'/auth.php';
