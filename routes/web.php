<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;

use App\Http\Middleware\MemberLoggedIn;

//Basic routes
Route::get('/',[LoginController::class,'loginPage'])->name('loginPage');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/registerPage',[LoginController::class,'registerPage'])->name('registerPage');
Route::post('/register',[LoginController::class,'register'])->name('register');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Member Routes
Route::prefix('Member')->middleware([MemberLoggedIn::class])->group(function () {

    Route::get('/home',[MemberController::class,'showHome'])->name('member_home');
    Route::get('/addTransaction',[MemberController::class,'showAddTransaction'])->name('member_showAddTransaction');
    Route::post('/addTransaction',[TransactionController::class,'addTransaction'])->name('member_addTransaction');

});