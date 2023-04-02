<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/start', [UserController::class, 'startQuiz'])->name('quiz.start');

Route::get('/loadQuestion', [QuestionController::class, 'loadQuestion'])->name('loadQuestion');
Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
Route::post('/answer', [QuestionController::class, 'answer'])->name('question.answer');
Route::post('/skip', [QuestionController::class, 'skip'])->name('question.skip');
Route::get('/results', [QuestionController::class, 'results'])->name('question.results');
