<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('/empresas','EmpresaController');
Route::apiResource('/oficios','OficioController');
Route::apiResource('/tipousuario','TypeUserController');
Route::apiResource('/empresa-oficio','EmpresaOficioController');
Route::apiResource('/usuarios','UserController');
Route::apiResource('/usuario-oficio','UsuarioOficioController');
Route::apiResource('/trabajos','TrabajoController');