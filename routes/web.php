<?php

use App\Http\Controllers\QuestionnaireController;

Route::get('/', [QuestionnaireController::class, 'index']);
Route::post('/submit', [QuestionnaireController::class, 'store'])->name('questionnaire.submit');
Route::get('/responses', [QuestionnaireController::class, 'responses'])->name('responses');