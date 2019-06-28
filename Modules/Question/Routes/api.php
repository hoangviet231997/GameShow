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

Route::middleware('auth:api')->get('/question', function (Request $request) {
    return $request->user();
});

//question

$api->version('v1',function ($api) {
    $api->group([
        'prefix' => 'Question',
        'namespace' => 'Modules\Question\Http\Controllers',
        'middleware' => 'CheckUser'
    ],function ($api) {
        $api->post('store','QuestionController@store');
        $api->post('show/{id}','QuestionController@show');
        $api->get('showall','QuestionController@showAll');
        $api->post('update/{id}','QuestionController@update');
        $api->post('destroy/{id}','QuestionController@destroy');
    });
});
