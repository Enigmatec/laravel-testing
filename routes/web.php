<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::view('/home', 'home')->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [UserController::class, 'register'])->name('register.user');
Route::get('/all-users', [UserController::class, 'allUser'])->name('allUser');
Route::delete('delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user'); 

Route::get('array-test', function () {
    $array1 = array(
        'name' => 'ade',
        'email' => 'ade@gmail.com',
        'password' => 'password'
    );

    $array2 = array_merge($array1, [
        'name' => ''
    ]);

    return $array2;
});