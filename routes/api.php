<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\InfirmierController;
use App\Http\Controllers\RendezvousController;

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

Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/me','me');
    Route::get('/user','showUsers');
    Route::get('/countUser','countUser');
});

Route::controller(MedecinController::class)->group(function(){
    Route::post('/create_medecin','create');
    Route::get('/medecin','show');
    Route::put('/update_medecin/{id}','update');
    Route::post('/delete_medecin/{id}','destroy');
});
Route::controller(PatientController::class)->group(function(){
    Route::post('/create_patient','create');
    Route::get('/patient','show');
    Route::put('/update_patient/{id}','update');
    Route::post('/delete_patient/{id}','destroy');
});
Route::controller(InfirmierController::class)->group(function(){
    Route::post('/register_inf', 'RegisterInf');
    Route::post('/login_inf','loginInf');
    Route::get('/me','me');
    Route::post('/create_infirmier','create');
    Route::get('/infirmier','show');
    Route::put('/update_infirmier/{id}','update');
    Route::post('/delete_infirmier/{id}','destroy');
});
Route::controller(ServiceController::class)->group(function(){
    Route::post('/create_service','create');
    Route::get('/service','show');
    Route::get('/services/{id}','edit');
    Route::put('/update_service/{id}','update');
    Route::post('/delete_service/{id}','destroy');
    Route::get('/page','paginate');
    Route::get('/countservice','countService');
});
Route::controller(TestController::class)->group(function(){
    Route::post('/create_test','create');
    Route::get('/test','show');
    Route::put('/update_test/{id}','update');
    Route::post('/delete_test/{id}','destroy');
    Route::get('/countTest','countTest');
});
Route::controller(RendezvousController::class)->group(function(){
    Route::post('/create_appointment','create');
    Route::put('/update_message/{id}','updateMessage');
    Route::get('/appointment','show');
    Route::get('/search','store');
    Route::get('/status0','select0');
    Route::get('/status1','select1');
    Route::get('/status2','select2');
    Route::get('/status3','select3');
    Route::get('/count','count');
    Route::get('/count0','count0');
    Route::get('/count1','count1');
    Route::get('/count2','count2');
    Route::get('/allcount','allCount');
    Route::get('all','All');
    Route::get('/today','appointToday');
    Route::get('/appointment/{id}','edit');
    Route::put('/update_appointment/{id}','update');
    Route::post('/delete_appointment/{id}','destroy');
});
