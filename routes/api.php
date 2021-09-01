<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Format penulisan routing
Route::{{method_name}}('{{path_uri}}', {{closure}});
Route::{{method_name}}('{{path_uri}}', '{{controller_name}}@{{function_name}}');
*/

// Route::post('/hello', function () {
//     return [
//         "status" => "201",
//         "message" => "Success"
//     ];
// });

Route::get('hello', 'App\Http\Controllers\HelloController@index');

// Route::get('hellofull', 'App\Http\Controllers\HelloFullController@index');
// Route::post('hellofull', 'App\Http\Controllers\HelloFullController@store');
// Route::get('hellofull/{{id}}', 'App\Http\Controllers\HelloFullController@show');
// Route::put('hellofull/{{id}}', 'App\Http\Controllers\HelloFullController@update');
// Route::delete('hellofull/{{id}}', 'App\Http\Controllers\HelloFullController@destroy');

Route::resource('hellofull', 'App\Http\Controllers\HelloFullController');

Route::resource('books', 'App\Http\Controllers\BookController')->except('create','edit');
