<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckProvider;

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
// General

Route::get('/', function () {
    return view('profile');
})->middleware('auth');

Auth::routes();

//Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login', [MainController::class, 'store']);

Route::post('/logout', [MainController::class, 'store'])->name('logout');

Route::get('/register', [MainController::class, 'register'])->name('register');

// Users

Route::get('/users', [UserController::class, 'users'])->name('users')->middleware('CheckAdmin');

Route::post('/registers', [UserController::class, 'store'])->name('registerUser');

Route::get('/users/delete/{user}', [UserController::class, 'destroy'])->name('userDelete');

Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('userEdit');

Route::post('/users/edit/{user}', [UserController::class, 'update'])->name('userUpdate');







/*Route::get('/users/provider/edit/{provider}', [ProviderController::class, 'edit'])->name('providerEdit');
Route::post('/users/provider/edit/{provider}', [ProviderController::class, 'update'])->name('providerUpdate');

Route::get('/users/provider/delete/{provider}', [ProviderController::class, 'destroy'])->name('providerDelete');



Route::get('/users/customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customerEdit');
Route::post('/users/customer/edit/{customer}', [CustomerController::class, 'update'])->name('customerUpdate');

Route::get('/users/customer/delete/{customer}', [CustomerController::class, 'destroy'])->name('customerDelete');*/

//Rooms

Route::get('/rooms', [RoomController::class, 'rooms'])->name('rooms');
Route::get('/roomsSearch', [RoomController::class, 'roomsSearch'])->name('roomsSearch');

Route::get('/rooms/room/{room}', [RoomController::class, 'room'])->name('room');

Route::get('/rooms/register', [RoomController::class, 'roomRegister'])->name('roomRegister')->middleware("CheckProvider");
Route::post('/rooms/add', [RoomController::class, 'store'])->name('roomAdd');

Route::get('/rooms/edit/{room}', [RoomController::class, 'edit'])->name('roomEdit');
Route::post('/rooms/edit/{room}', [RoomController::class, 'update'])->name('roomUpdate');

Route::get('/rooms/delete/{room}', [RoomController::class, 'destroy'])->name('roomDelete');

Route::get('/rooms/reserve/{room}', [RoomController::class, 'roomReserve'])->name('roomReserve');
Route::get('/rooms/reserveCancel/{room}', [RoomController::class, 'roomCancel'])->name('roomCancel');

Route::get('/rooms/reserved', [RoomController::class, 'roomReserved'])->name('roomReserved');

Route::get('/rooms/myRooms', [RoomController::class, 'myRooms'])->name('myRooms');

//Comment

Route::get('/comment/register/{room}', [CommentController::class, 'comment'])->name('commentRegister');
Route::post('/comment/add', [CommentController::class, 'store'])->name('commentAdd');

Route::get('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('commentEdit');
Route::post('/comment/edit/{comment}', [CommentController::class, 'update'])->name('commentUpdate');

Route::get('/comment/delete/{comment}', [CommentController::class, 'destroy'])->name('commentDelete');

Route::get('/comment/myComments', [CommentController::class, 'myComments'])->name('myComments');

//Auth

/*Route::post('/register/provider', [ProviderController::class, 'store'])->name('registerProvider');
Route::post('/login/provider', [ProviderController::class, 'store'])->name('loginProvider');



Route::post('/register/customer', [CustomerController::class, 'store'])->name('registerCustomer');
Route::post('/login/customer', [CustomerController::class, 'store'])->name('loginCustomer');


Route::post('/login/admin', [AdminController::class, 'store'])->name('loginAdmin');*/




Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


