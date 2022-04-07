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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/patients', [\App\Http\Controllers\Api\PatientsController::class, 'index']);
Route::get('/diagnoses', [\App\Http\Controllers\Api\DiagnosesController::class, 'index']);
Route::prefix('/history')->group(function (){

    Route::get('', [\App\Http\Controllers\Api\MedicalHistoryController::class, 'index']);

    Route::prefix('/illness')->group(function(){
        Route::get('/{id}', [\App\Http\Controllers\Api\MedicalHistoryController::class, 'illness']);
        Route::post('/delete', [\App\Http\Controllers\Api\MedicalHistoryController::class, 'delete']);//тут должен быть delete method
        Route::put('/update', [\App\Http\Controllers\Api\MedicalHistoryController::class, 'edit']);
    });

    Route::post('/create', [\App\Http\Controllers\Api\MedicalHistoryController::class, 'create']);


});


