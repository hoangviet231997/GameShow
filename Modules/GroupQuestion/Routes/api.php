<?php

use Dingo\Api\Routing\Router;
$api = app(Router::class);
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

Route::middleware('auth:api')->get('/show', function (Request $request) {
    return $request->user();
});

$api->version('v1',function (Router $api){
    $api->group(
        [
            'prefix' =>'Group-Question',
            'namespace' => 'Modules\GroupQuestion\Http\Controllers',
            'middleware' => 'CheckUser'
        ],
        function (Router $api)
        {
            $api->post('Store','GroupQuestionController@store');
            $api->post('Show/{id}','GroupQuestionController@show');
            $api->get('ShowALL','GroupQuestionController@showAll');
            $api->post('Update/{id}','GroupQuestionController@update');
            $api->post('Destroy/{id}','GroupQuestionController@destroy');
        });
});
