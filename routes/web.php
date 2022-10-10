<?php


use Illuminate\Support\Facades\Route;


Route::get('/',function () {
    return view('index');
});


Route::get('/contact-us',[\App\Http\Controllers\ContactController::class,'index'])->name('contact');
Route::post('/contact-us',[\App\Http\Controllers\ContactController::class,'store'])->name('contact');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/arabic', [\App\Http\Controllers\LanguagesController::class, 'arabic'])->name('arabic');
Route::get('/english', [\App\Http\Controllers\LanguagesController::class, 'english'])->name('english');


Route::get('/logout',function () {
    Auth::logout();
    return redirect('/');
});
