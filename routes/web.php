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


Route::prefix('/answers')->group(function (){
    Route::get('/form/{title}',
        [App\Http\Controllers\LessonControllers\ShowFormController::class,
            'showForm']);
    Route::post('/create',
        [App\Http\Controllers\LessonControllers\ShowFormController::class,
            'create']);
});
Route::prefix('/grades')->group(function (){
    Route::get('/', function(){
        return view('frontend.pages.grades');
    });
});
Route::prefix('/lesson')->group(function (){
    Route::get('/{title}',
        [App\Http\Controllers\LessonControllers\ShowController::class,
            'showOne']);
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
    //Route::get('/logout')
/*});*/

require __DIR__.'/auth.php';
