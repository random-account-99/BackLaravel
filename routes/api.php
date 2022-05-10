<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('pessoas','App\Http\Controllers\ApiController@getPessoas');
Route::get('pessoas/{id}','App\Http\Controllers\ApiController@getPessoa');
Route::post('pessoa','App\Http\Controllers\ApiController@createPessoa');
Route::delete('pessoa/{id}','App\Http\Controllers\ApiController@deletePessoa');

Route::get('disciplinas','App\Http\Controllers\ApiController@getDisciplinas');
Route::get('disciplinas/{id}','App\Http\Controllers\ApiController@getDisciplina');
Route::post('disciplina','App\Http\Controllers\ApiController@createDisciplina');
Route::delete('disciplina/{id}','App\Http\Controllers\ApiController@deleteDisciplina');
