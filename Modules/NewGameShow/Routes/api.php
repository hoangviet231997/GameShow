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

Route::middleware('auth:api')->get('/newgameshow', function (Request $request) {
    return $request->user();
});

//NewGameShow
$api->version('v1',function (Router $api) {
    $api->group([
        'prefix'=>'user',
        'namespace' => 'Modules\NewGameShow\Http\Controllers',

    ],function (Router $api)
    {
        $api->post('register','UserController@register');
        $api->post('login','UserController@login');
        $api->post('logout','UserController@logout')->middleware('CheckUser');
        $api->post('me','UserController@me')->middleware('CheckUser');
    });
});
