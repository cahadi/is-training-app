<?php

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

Route::get('/', function (){
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/implementation')->group(function (){

    Route::get('/{id}', [\App\Http\Controllers\ImplementationControllers\ShowController::class,
        'show'])->name('implementation');
    Route::get('showForm/{id}', [\App\Http\Controllers\ImplementationControllers\ShowFormController::class,
        'showForm'])->name('implementation.answer_form');
    Route::post('store', [\App\Http\Controllers\StoreController::class, 'store'])->name('answers.store');
});
Route::prefix('/functioning')->group(function (){

    Route::get('/{id}', [\App\Http\Controllers\ImplementationControllers\ShowController::class, 'show'])
        ->name('functioning');
    Route::get('showForm/{id}', [\App\Http\Controllers\ImplementationControllers\ShowFormController::class,
        'showForm'])->name('functioning.answer_form');

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

require __DIR__.'/auth.php';
