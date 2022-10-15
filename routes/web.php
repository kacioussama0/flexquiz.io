<?php


use Illuminate\Support\Facades\Route;


Route::get('/',function () {
    return view('index');
})->name('home');


Route::get('/contact-us',[\App\Http\Controllers\ContactController::class,'index'])->name('contact');
Route::post('/contact-us',[\App\Http\Controllers\ContactController::class,'store'])->name('contact');
Route::get('/messages',[\App\Http\Controllers\ContactController::class,'allMessages'])->name('messages ');
Route::delete('messages/{id}',[\App\Http\Controllers\ContactController::class,'deleteMessage'])->name('messages/delete');
Route::delete('messages',[\App\Http\Controllers\ContactController::class,'deleteAllMessage'])->name('messages/delete-all');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/arabic', [\App\Http\Controllers\LanguagesController::class, 'arabic'])->name('arabic');
Route::get('/english', [\App\Http\Controllers\LanguagesController::class, 'english'])->name('english');


Route::get('/logout',function () {
    Auth::logout();
    return redirect('/');
});

Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('quizzes',\App\Http\Controllers\QuizController::class);
Route::get('questions/create/{quiz}',[\App\Http\Controllers\QuestionController::class,'create']);
Route::post('questions/create/{quiz}',[\App\Http\Controllers\QuestionController::class,'store']);
Route::get('questions/{quiz}',[\App\Http\Controllers\QuestionController::class,'show'])->name('show-question');
Route::resource('questions',\App\Http\Controllers\QuestionController::class);
