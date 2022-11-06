<?php

use App\Http\Controllers\Admin30Controller;
use App\Http\Controllers\Agama30Controller;
use App\Http\Controllers\Auth\Login30Controller;
use App\Http\Controllers\Auth\Register30Controller;
use App\Http\Controllers\User30Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailData30Controller;

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
    return redirect('/admin30');
});
Route::get('/login30', [Login30Controller::class, 'showLoginForm'])->name('login');
Route::post('/login30', [Login30Controller::class, 'login']);
Route::get('/register30', [Register30Controller::class, 'showRegistrationForm'])->name('register');
Route::post('/register30', [Register30Controller::class, 'register']);
Route::get('/logout30', [Login30Controller::class, 'logout'])->name('logout');

Auth::routes(['login' => false, 'register' => false]);
Route::middleware('auth', 'isAdmin')->group(function () {
    Route::get('/admin30', function () {
        return redirect('/admin30/dashboard30');
    });
    Route::get('/admin30/dashboard30', [Admin30Controller::class, 'index30']);
    Route::post('/admin30/dashboard30/update-foto-profil30', [Admin30Controller::class, 'update_foto30']);
    Route::get('/admin30/approve30/{id}', [User30Controller::class, 'approve30']);
    Route::get('/admin30/data-agama30', [Agama30Controller::class, 'index30']);
    Route::post('/admin30/data-agama30/create30', [Agama30Controller::class, 'create30']);
    Route::get('/admin30/data-agama30/edit30/{id}', [Agama30Controller::class, 'edit30']);
    Route::post('/admin30/data-agama30/update30', [Agama30Controller::class, 'update30']);
    Route::get('/admin30/data-agama30/delete30/{id}', [Agama30Controller::class, 'delete30']);
    Route::get('/admin30/dashboard30/detail30/{id}', [DetailData30Controller::class, 'index30']);
});
Route::middleware('auth', 'isUser')->group(function () {
    Route::get('/dashboard30', [User30Controller::class, 'index30'])->name('home');
    Route::get('/dashboard30/edit-data30', [User30Controller::class, 'edit30']);
    Route::get('/dashboard30/ganti-password30', [User30Controller::class, 'gantipass30']);
    Route::post('/dashboard30/update-password30', [User30Controller::class, 'updatepass30']);
    Route::post('/dashboard30/update-data30', [User30Controller::class, 'update30']);
    Route::post('/dashboard30/update-foto-profil30', [Admin30Controller::class, 'update_foto30']);
});
