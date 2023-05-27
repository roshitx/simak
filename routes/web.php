<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\KuesionerController;

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

Route::get('/', [ViewController::class, 'home'])->name('home.page');

Auth::routes();
Route::get('/logouts', [ViewController::class, 'logout'])->name('logouts');

// Dashboard Admin & Client
Route::group(['middleware' => 'auth'], function() {
    // Halaman dashboard
    Route::get('/dashboard', function () {    
        return view('dashboard.index');
    })->name('dashboard');

    // Route resource controller
    Route::resource('administrator/users', UserController::class)->middleware('admin');
    Route::resource('client/kuesioner', KuesionerController::class)->middleware('auth');
    Route::resource('client/kuesioner/question', QuestionController::class)->middleware('auth');

    // Generate link
    Route::get('/kuesioner/{id}/generate-link', [KuesionerController::class, 'generateLink'])->name('generate.link');
    // Choices
    Route::get('/client/kuesioner/addchoices/{id}', [ChoiceController::class, 'index'])->name('add.choices');
    Route::post('/choices', [ChoiceController::class, 'store'])->name('choice.store');
});
