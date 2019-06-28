<?php

$api = app('Dingo\Api\Routing\Router');


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

Route::middleware('auth:api')->get('/typequestion', function (Request $request) {
    return $request->user();
});
//type_question

$api->version('v1',function ($api){
    $api->group([
        'prefix' => 'type-question',
        'namespace' => 'Modules\TypeQuestion\Http\Controllers',
        'middleware' => 'CheckUser'
    ],function ($api){
        $api->post('store','TypeQuestionController@store');
        $api->post('show/{type_questions_id}','TypeQuestionController@show');
        $api->post('update/{type_questions_id}','TypeQuestionController@update');
        $api->post('destroy/{type_questions_id}','TypeQuestionController@destroy');
        $api->get('show-all','TypeQuestionController@showAll');
    });
});
