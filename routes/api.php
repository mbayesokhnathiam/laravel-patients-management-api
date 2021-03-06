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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'PassportController@login')->name('login');;
Route::post('register', 'PassportController@register');

 
Route::middleware('auth:api')->group(function () {

    Route::get('user', 'PassportController@details');
    Route::get('user/logout','PassportController@logout');
    
    Route::resource('Profile', 'ProfileController');

    Route::resource('Constante', 'ConstantesController');

    Route::resource('Consultation', 'ConsultationController');

    Route::resource('Patient', 'PatientController');

    Route::resource('Rendezvous', 'RendezvousController');

    Route::get('Constante/consultation/{id}','ConstantesController@getConsultation');

});
























// mettre en dernier
// if page not found
Route::fallback(function(){
    return response()->json([
        'success' => false,
        'message' => 'Page Not Found. If error persists, contact admin@website.com'], 404);
});

