<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/',[TaskController::class, 'Index_View'])->name('index');
Route::get('/blog',[TaskController::class, 'Blog_single'])->name('singleblog');

Route::get('/regrout',[TaskController::class, 'Reg_View'])->name('reg');
Route::post('/regrout',[TaskController::class, 'Reg_Insert'])->name('userreg');

Route::get('/login',[TaskController::class, 'Login_View'])->name('userlog');
Route::post('/login',[TaskController::class, 'Login'])->name('logincheck');

// Middle-ware Concept For Security 
Route::group(['middleware' => ['task', 'demo']], function () 
{

Route::get('/blogrout',[TaskController::class, 'Blog_View'])->name('blog');
Route::post('/insertrout',[TaskController::class, 'Insert_Blog'])->name('insert');

Route::get('/Display_rout',[TaskController::class, 'Display_View']);
Route::get('/logout_rout',[TaskController::class, 'Logout'])->name('logout');

Route::get('/delete/{id}', [TaskController::class, 'Delete'])->name('delete');
Route::get('/edit/{id}', [TaskController::class, 'Edit'])->name('edit');

});




