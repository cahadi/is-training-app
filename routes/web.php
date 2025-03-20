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





Route::prefix('/activities')->group(function (){
    Route::get('/',
        [\App\Http\Controllers\AnswerControllers\ShowController::class, 'showAll'])
        ->name('all');
    Route::get('/{id}',
        [\App\Http\Controllers\AnswerControllers\ShowController::class, 'showOne'])
        ->name('one');
});
Route::prefix('/answers')->group(function (){

});
Route::prefix('/grades')->group(function (){
    Route::get('/', function(){
        return view('frontend.pages.grades');
    });
});
Route::prefix('/lessons')->group(function (){
    Route::get('/', function(){
        return view('frontend.pages.lessons');
    });
});
Route::prefix('/roles')->group(function (){

});
Route::prefix('/subjects')->group(function (){

});
Route::prefix('/topics')->group(function (){

});
Route::prefix('/types')->group(function (){

});
Route::prefix('/users')->group(function (){

});

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
