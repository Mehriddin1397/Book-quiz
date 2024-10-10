<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main');
})->name('main');

Route::get('about', function () {
    return view('pages.about');
})->name('about');

Route::get('service', function () {
    return view('pages.service');
})->name('service');

Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/create-code', [\App\Http\Controllers\admin\AdminController::class, 'createCode'])->name('admin.createCode');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('startquiz', [QuestionController::class, 'startQuiz'])->name('startquiz');
    Route::any('submitans', [QuestionController::class, 'submitans'])->name('submitans');
    Route::post('/admin/create-code', 'AdminController@createCode')->name('admin.createCode');

});



//Admin panel login register start
Route::get('intern', [\App\Http\Controllers\Admin\AdminController::class, 'admin'])->name('admin');
Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login1', [\App\Http\Controllers\Admin\AuthController::class, 'login1'])->name('login1');
Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('quizzes',   \App\Http\Controllers\QuizController::class);
    Route::resource('questions', \App\Http\Controllers\QuestionController::class);
    Route::resource('code',\App\Http\Controllers\TestCodeController::class);

    Route::post('/test/verify-code', [TestController::class,'verifyCode'])->name('test.verifyCode');



});



Route::get('start', function () {
    return view('questions.code');
})->middleware(['auth', 'verified'])->name('start');

Route::get('end', function () {
    return view('questions.end');
})->name('end');

Route::get('ansDesk', function () {
    return view('questions.answerDesk');
})->name('ansDesk');

Route::get('create', function () {
    return view('questions.create');
});





Route::get('/test/start', [\App\Http\Controllers\TestController::class, 'startTest'])->name('startTest');
Route::post('/test/submit', [\App\Http\Controllers\TestController::class, 'submitTest'])->name('submitTest');
Route::post('/savetestresults',[\App\Http\Controllers\TestController::class,'saveResults'])->name('saveResults');



require __DIR__.'/auth.php';
