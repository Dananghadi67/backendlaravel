<?php

use App\Http\Controllers\Api\Agama30Controller;
use App\Http\Controllers\Api\User30Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/data-agama30', [Agama30Controller::class, 'index30']);
Route::post('/create-agama30', [Agama30Controller::class, 'create30']);
Route::get('/approve-user30/{id}', [User30Controller::class, 'approve30']);
Route::get('/show-agama30/{id}', [Agama30Controller::class, 'show30']);
Route::post('/update-agama30', [Agama30Controller::class, 'update30']);
Route::get('/delete-agama30/{id}', [Agama30Controller::class, 'delete30']);

Route::get('/data-user30', [User30Controller::class, 'index30']);
Route::get('/show-user30/{id}', [User30Controller::class, 'show30']);
Route::post('/update-password30', [User30Controller::class, 'updatepass30']);
Route::post('/update-user30', [User30Controller::class, 'update30']);
Route::post('/update-foto-profil30', [User30Controller::class, 'updatefoto30']);
