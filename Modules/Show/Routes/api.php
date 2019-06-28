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
            'prefix' =>'Show',
            'namespace' => 'Modules\Show\Http\Controllers',
            'middleware' => 'CheckUser'
        ],
        function (Router $api)
        {
            $api->post('Store','ShowController@store');
            $api->post('Show/{id}','ShowController@show');
            $api->get('ShowALL','ShowController@showAll');
            $api->post('Update/{id}','ShowController@update');
            $api->post('Destroy/{id}','ShowController@destroy');
        });
});
