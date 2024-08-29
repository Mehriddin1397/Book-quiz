<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('quizzes', \App\Http\Controllers\QuizController::class);
Route::resource('quizzes.questions', \App\Http\Controllers\QuestionController::class)->shallow();

Route::get('quizzes/{quiz}/take', [\App\Http\Controllers\QuizController::class, 'take'])->name('quizzes.take');
Route::post('quizzes/{quiz}/submit', [\App\Http\Controllers\QuizController::class, 'submit'])->name('quizzes.submit');



require __DIR__.'/auth.php';
