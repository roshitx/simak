<?php

use App\Models\User;
use App\Models\Respon;
use App\Models\Question;
use App\Models\Kuesioner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\ResponController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\StatisticController;

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
// Homepage
Route::get('/', [ViewController::class, 'home'])->name('home.page');

// Login & Register Route
Auth::routes();
Route::get('/logouts', [ViewController::class, 'logout'])->name('logouts');

// Dashboard Admin & Client
Route::group(['middleware' => 'auth'], function() {
    // Halaman dashboard
    Route::get('/dashboard', function () {    
        $user = auth()->user();
        if ($user->role === 'Admin') {
            $kuesioner = Kuesioner::all();
            $question = Question::all();
        } else if ($user->role === 'Client') {
            $kuesioner = Kuesioner::where('user_id', $user->id)->get();
            $question = Question::where('user_id', $user->id)->get();
        } else {
        }
        
        return view('dashboard.index', [
            'user' => User::all(),
            'kuesioner' => $kuesioner,
            'question' => $question,
            'respon' => Respon::all(),
        ]);
    })->name('dashboard');

    Route::get('administrator/kuesioner', [ViewController::class, 'allKuesioner'])->middleware('admin')->name('all.kuesioner');
    // Route resource controller
    Route::resource('administrator/users', UserController::class)->middleware('admin');
    Route::resource('client/kuesioner', KuesionerController::class)->middleware('auth');
    Route::resource('client/kuesioner/question', QuestionController::class)->middleware('auth');

    // Generate link
    Route::get('/kuesioner/{id}/generate-link', [KuesionerController::class, 'generateLink'])->name('generate.link');
    // Choices
    Route::get('/client/kuesioner/addchoices/{id}', [ChoiceController::class, 'index'])->name('add.choices');
    Route::post('/choices', [ChoiceController::class, 'store'])->name('choice.store');

    // Stats Route
    Route::get('client/statistic', [StatisticController::class, 'allStatistic'])->name('all.statistic');
    Route::get('client/statistic/{id}', [StatisticController::class, 'detailStatistic'])->name('detail.statistic');
    Route::get('question/stats', [StatisticController::class, 'getQuestionStats'])->name('question.stats');
    Route::get('respon/stats', [StatisticController::class, 'getResponStats'])->name('respon.stats');
});

// Responden route
Route::get('/kuesioner/{link}', [ViewController::class, 'respon'])->name('kuesioner.respon');
Route::post('/respons', [ResponController::class, 'store'])->name('respon.store');
Route::get('/success-respon', [ViewController::class, 'successRespon'])->name('suksesrespon');
