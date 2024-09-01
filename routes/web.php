<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

Route::resources([
    'questions' => QuestionController::class,
    'quizzes' => QuizController::class,
]);

Route::get('start', function () {
    return view('questions.start');
})->name('start');

Route::get('end', function () {
    return view('questions.end');
})->name('end');

Route::get('ansDesk', function () {
    return view('questions.answerDesk');
})->name('ansDesk');

Route::get('create', function () {
    return view('questions.create');
});

require __DIR__.'/auth.php';
