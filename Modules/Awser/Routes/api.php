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

Route::middleware('auth:api')->get('/awser', function (Request $request) {
    return $request->user();
});

//awsers

$api->version('v1',function ($api) {
   $api->group([
           'prefix' => 'Awser',
       'namespace' => 'Modules\Awser\Http\Controllers',
       'middleware' => 'CheckUser'
   ],function ($api) {
      $api->post('store','AwserController@store');
      $api->post('show/{id}','AwserController@show');
      $api->get('showAll','AwserController@showAll');
      $api->post('update/{id}','AwserController@update');
      $api->post('destroy/{id}','AwserController@destroy');
   });
});
