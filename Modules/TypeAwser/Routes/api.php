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
//type_awser

$api->version('v1',function ($api){
    $api->group([
        'prefix' => 'type-awser',
        'namespace' => 'Modules\TypeAwser\Http\Controllers',
        'middleware' => 'CheckUser'
    ],function ($api){
        $api->post('store','TypeAwserController@store');
        $api->post('show/{type_awsers_id}','TypeAwserController@show');
        $api->post('update/{type_awsers_id}','TypeAwserController@update');
        $api->post('destroy/{type_awsers_id}','TypeAwserController@destroy');
        $api->get('show-all','TypeAwserController@showAll');
    });
});
