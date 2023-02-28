<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

// Get method

Route::get('user', [TestController::class, 'listAllUsers'])->name('users.listAll');
Route::get('user/new', [TestController::class, 'addUser'])->name('users.addUser');
Route::get('user/edit/{user}', [TestController::class, 'formEditUser'])->name('users.formEditUser');
Route::get('user/{user}', [TestController::class, 'listUser'])->name('users.listOne');

// Post method

Route::post('user/signInUser', [TestController::class, 'signInUser'])->name('users.signInUser');

// Put/Patch method

Route::put('user/editUser/{user}', [TestController::class, 'editUser'])->name('users.editUser');

// Delete method

Route::delete('user/destroy/{user}', [TestController::class, 'destroyUser'])->name('user.destroy');
