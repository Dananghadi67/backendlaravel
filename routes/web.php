<?php

use App\Http\Controllers\Auth\Login30Controller;
use App\Http\Controllers\Auth\Register30Controller;
use App\Http\Controllers\Client\ClientLogin30Controller;
use App\Http\Controllers\Client\ClientRegister30Controller;
use App\Http\Controllers\Admin30Controller;
use App\Http\Controllers\Agama30Controller;
use App\Http\Controllers\DetailData30Controller;
use App\Http\Controllers\User30Controller;
use App\Http\Controllers\Client\Admin30Controller as ClientAdmin;
use App\Http\Controllers\Client\Agama30Controller as ClientAgama;
use App\Http\Controllers\Client\DetailData30Controller as ClientDetail;
use App\Http\Controllers\Client\User30Controller as ClientUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/client/login30');
});
Route::get('/login30', [Login30Controller::class, 'showLoginForm'])->name('login');
Route::post('/login30', [Login30Controller::class, 'login']);
Route::get('/register30', [Register30Controller::class, 'showRegistrationForm'])->name('register');
Route::post('/register30', [Register30Controller::class, 'register']);
Route::get('/logout30', [Login30Controller::class, 'logout'])->name('logout');

Route::get('/client/login30', [ClientLogin30Controller::class, 'showLoginForm'])->name('loginClient');
Route::post('/client/login30', [ClientLogin30Controller::class, 'login']);
Route::get('/client/register30', [ClientRegister30Controller::class, 'showRegistrationForm'])->name('registerClient');
Route::post('/client/register30', [ClientRegister30Controller::class, 'register']);
Route::get('/client/logout30', [ClientLogin30Controller::class, 'logout'])->name('logoutClient');

Auth::routes(['login' => false, 'register' => false]);
Route::middleware('auth', 'isAdmin')->group(function () {
    Route::get('/admin30', function () {
        return redirect('/client/admin30/dashboard30');
    });
    Route::get('/admin30/dashboard30', function () {
        return redirect('/client/admin30/dashboard30');
    });
    Route::post('/admin30/dashboard30/update-foto-profil30', [Admin30Controller::class, 'update_foto30']);
    Route::get('/admin30/approve30/{id}', [User30Controller::class, 'approve30']);
    Route::get('/admin30/data-agama30', [Agama30Controller::class, 'index30']);
    Route::post('/admin30/data-agama30/create30', [Agama30Controller::class, 'create30']);
    Route::get('/admin30/data-agama30/edit30-{id}', [Agama30Controller::class, 'edit30']);
    Route::post('/admin30/data-agama30/update30', [Agama30Controller::class, 'update30']);
    Route::get('/admin30/data-agama30/delete30/{id}', [Agama30Controller::class, 'delete30']);
    Route::get('/admin30/dashboard30/detail30/{id}', [DetailData30Controller::class, 'index30']);

    //Client API
    Route::get('/client/admin30', function () {
        return redirect('/client/admin30/dashboard30');
    });
    Route::get('/client/admin30/dashboard30', [ClientAdmin::class, 'index30']);
    Route::post('/client/admin30/dashboard30/update-foto-profil30', [ClientAdmin::class, 'update_foto30']);
    Route::get('/client/admin30/approve30/{id}', [ClientUser::class, 'approve30']);
    Route::get('/client/admin30/data-agama30', [ClientAgama::class, 'index30']);
    Route::post('/client/admin30/data-agama30/create30', [ClientAgama::class, 'create30']);
    Route::get('/client/admin30/data-agama30/edit30-{id}', [ClientAgama::class, 'edit30']);
    Route::put('/client/admin30/data-agama30/update30', [ClientAgama::class, 'update30']);
    Route::get('/client/admin30/data-agama30/delete30-{id}', [ClientAgama::class, 'delete30']);
    Route::get('/client/admin30/dashboard30/detail30-{id}', [ClientDetail::class, 'index30']);
});
Route::middleware('auth', 'isUser')->group(function () {
    // Route::get('/dashboard30', [User30Controller::class, 'index30'])->name('home');
    Route::get('/dashboard30', function () {
        return redirect('client/dashboard30');
    });
    Route::get('/dashboard30/edit-data30', [User30Controller::class, 'edit30']);
    Route::get('/dashboard30/ganti-password30', [User30Controller::class, 'gantipass30']);
    Route::post('/dashboard30/update-password30', [User30Controller::class, 'updatepass30']);
    Route::post('/dashboard30/update-data30', [User30Controller::class, 'update30']);
    Route::post('/dashboard30/update-foto-profil30', [Admin30Controller::class, 'update_foto30']);

    //Client API
    Route::get('/client/dashboard30', [ClientUser::class, 'index30'])->name('home');
    Route::get('/client/dashboard30/edit-data30', [ClientUser::class, 'edit30']);
    Route::get('/client/dashboard30/ganti-password30', [ClientUser::class, 'gantipass30']);
    Route::post('/client/dashboard30/update-password30', [ClientUser::class, 'updatepass30']);
    Route::put('/client/dashboard30/update-data30', [ClientUser::class, 'update30']);
    Route::put('/client/dashboard30/update-foto-profil30', [ClientAdmin::class, 'update_foto30']);
});
