<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// User App 
Route::get('/user','UserAppContrpller@getUser');
Route::post('/user','UserAppContrpller@postUser');
Route::post('/findphone','UserAppContrpller@FindPhoneCreate');
Route::post('/edituser', 'UserAppContrpller@Edituser');


// all Doctors in Counter
Route::get('/country','CountryContrpller@getCountry');
Route::post('/country','CountryContrpller@postCountry');

// all Doctors in specialties
Route::get('/specialties','SpecialtiesContrpller@getSpecialties');
Route::post('/specialties','SpecialtiesContrpller@postSpecialties');

// alll Doctors 
Route::get('/doctors','DoctorsContrpller@getDoctors');
Route::post('/doctors','DoctorsContrpller@postDoctors');

// Patients
Route::get('/patients','PatientsContrpller@getPatients');
Route::post('/patients','PatientsContrpller@postPatients');

// Evaluation
Route::get('/evaluation','EvaluationContrpller@getEvaluation');
Route::post('/evaluation','EvaluationContrpller@postEvaluation');

// Consulting
Route::get('/consulting','ConsultingContrpller@getConsultating');
Route::post('/consulting','ConsultingContrpller@postConsultating');

// ConsultatingExtension
Route::get('/extension','ExtensionConsultingContrpller@getConsultatingExtension');
Route::post('/extension','ExtensionConsultingContrpller@postConsultatingExtension');
