<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsutaSIJController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuezController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPerfilController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;

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


//Route::apiResource('juez', JuezController::class);
Route::get('menuListar/{id}', [MenuController::class, 'menuListar']);
Route::apiResource('menu', MenuController::class);
Route::apiResource('perfil', PerfilController::class);
Route::get('perfilActivo', [PerfilController::class, 'perfilActivo']);
Route::apiResource('menuperfil', MenuPerfilController::class);
Route::apiResource('user', UserController::class);
//filtros
Route::post('ConsultaDistrito', [ConsutaSIJController::class, 'ConsultaDistrito']);
Route::post('ConsultaSede', [ConsutaSIJController::class, 'ConsultaSede']);
Route::post('ConsultaDependencia', [ConsutaSIJController::class, 'ConsultaDependencia']);
//reportes
Route::post('ConsultaLaboral', [ConsutaSIJController::class, 'ConsultaLaboral']);
Route::post('ConsultaNotificar', [ConsutaSIJController::class, 'ConsultaNotificar']);
Route::post('ConsultaFirmas', [ConsutaSIJController::class, 'ConsultaFirmas']);
Route::post('ConsultaApelacion', [ConsutaSIJController::class, 'ConsultaApelacion']);
Route::post('ConsultaFallo', [ConsutaSIJController::class, 'ConsultaFallo']);
Route::post('ConsultaEscritoConsolidado', [ConsutaSIJController::class, 'ConsultaEscritoConsolidado']);
Route::post('ConsultaEscritoDetalle', [ConsutaSIJController::class, 'ConsultaEscritoDetalle']);
Route::post('ConsultaEscritos', [ConsutaSIJController::class, 'ConsultaEscritos']);
Route::post('ConsultaIngreso', [ConsutaSIJController::class, 'ConsultaIngreso']);
Route::post('ConsultaProduccionConsolidado', [ConsutaSIJController::class, 'ConsultaProduccionConsolidado']);
Route::post('ConsultaProduccionDetalle', [ConsutaSIJController::class, 'ConsultaProduccionDetalle']);
Route::post('ConsultaAudiencia', [ConsutaSIJController::class, 'ConsultaAudiencia']);
Route::post('ConsultaInteroperabilidad', [ConsutaSIJController::class, 'ConsultaInteroperabilidad']);
//adicionales sistemas diversos
Route::post('ConsultaOrientacion', [ConsutaSIJController::class, 'ConsultaOrientacion']);
Route::post('ConsultaMV', [ConsutaSIJController::class, 'ConsultaMV']);
//Route::apiResource('ConsultaLaboral', ConsutaSIJController::class, ['ConsultaLaboral','ConsultaUsuario']);
//Route::apiResource('consultaJuez', [ConsutaSIJController::class, 'ConsultaJuez']);
//Route::apiResource('consultaOOJJ', [ConsutaSIJController::class, 'ConsultaOrganoJuris']);


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);    

});
