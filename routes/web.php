<?php

use App\Http\Controllers\CommentsController;
use App\Models\education;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('Welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/education', function () {
    return view('education',['educations' => education::all()]);
});
Route::get('/skills', function () {
    return view('skills');
});
Route::get('/projects', [ProjectsController::class,'index']);

Route::get('/projects/{id}',[ProjectsController::class,'show'] );

Route::get('/project/create',[ProjectsController::class,'showForm'] );

Route::post('/project/addProject',[ProjectsController::class,'addProject'] );

Route::post('/projects/{id1}/editproject/{id}',[ProjectsController::class,'editproject'] );//editproject

Route::post('/project/delete/{id}',[ProjectsController::class,'delete'] );//editproject

Route::get('/projects/{id}/edit',[ProjectsController::class,'edit'] );

Route::get('/register',function(){return View('registerForm');});

Route::get('/loginform',function(){return View('loginForm');})->name('login');

Route::post('/logout',[UserController::class,'logout']);

Route::post('/addUSer',[UserController::class,'add']);

Route::post('/login',[UserController::class,'login']);

Route::post('/comments/{id}',[CommentsController::class,'add'])->middleware("auth");
