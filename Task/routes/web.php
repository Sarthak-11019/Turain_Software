<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

use App\Models\TaskModel;


Route::get('/view', function () {
    return view('welcome');
});

Route::get('/login',[TaskController::class, 'Login_View'])->name('userlog');
Route::post('/login_',[TaskController::class, 'Login'])->name('logincheck');

Route::get('/blogrout',[TaskController::class, 'Blog_View'])->name('blog');
Route::post('/insertrout',[TaskController::class, 'Insert_Blog'])->name('insert');

Route::get('/regrout',[TaskController::class, 'Reg_View']);
Route::post('/regrout',[TaskController::class, 'Reg_Insert'])->name('userreg');

Route::get('/Display_rout',[TaskController::class, 'Display_View']);

