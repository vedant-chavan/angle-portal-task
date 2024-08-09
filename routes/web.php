<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\UserDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/user_login',[UserLoginController::class,'userLogin'])->name('user_login');
Route::get('/user_registration',[UserRegistrationController::class,'userRegistration'])->name('user_registration');

Route::post('/register_user',[UserRegistrationController::class,'registerUserData'])->name('register_user');

Route::post('/login_user',[UserLoginController::class,'userLoginData'])->name('login_user');

Route::middleware('auth')->group( function () {
    Route::get('user_data',[UserDataController::class,'userData'])->name('user_data');

    Route::post('/edit_user_data',[UserDataController::class,'editUserData'])->name('edit_user_data');

    Route::post('/delete_user',[UserDataController::class,'deleteUser'])->name('delete_user');

    Route::get('/logout',[UserLoginController::class,'Logout'])->name('logout');
});