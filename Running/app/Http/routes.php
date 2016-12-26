<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/home', [
    'middleware' => 'auth',
    'uses' => 'HomeController@getHome'
]);

Route::post('/home/public', [
    'middleware' => 'auth',
    'uses' => 'HomeController@postPublic'
]);

Route::post('/home/like', [
    'middleware' => 'auth',
    'uses' =>  'HomeController@postLike'
]);
Route::post('/home/delete', [
    'middleware' => 'auth',
    'uses' => 'HomeController@postDelete'
]);

Route::get('/home/{email}', [
    'middleware' => 'auth',
    'uses' => 'HomeController@getOtherHome'
]);



Route::get('/user', [
    'middleware' => 'auth',
    'uses' => 'UserController@getUser'
]);
Route::post('/user/information', [
    'middleware' => 'auth',
    'uses' => 'UserController@postInformation'
]);
Route::post('/user/img',  [
    'middleware' => 'auth',
    'uses' => 'UserController@postImg'
]);

Route::post('/user/password', [
    'middleware' => 'auth',
    'uses' => 'UserController@postPassword'
]);


Route::get('/friends', [
    'middleware' => 'auth',
    'uses' => 'FriendsController@getFriends'
]);

Route::post('/friends/following',  [
    'middleware' => 'auth',
    'uses' => 'FriendsController@postFollowing'
]
);


Route::get('/match', [
    'middleware' => 'auth',
    'uses' => 'MatchController@getMatch'
]);
Route::post('/match', [
    'middleware' => 'auth',
    'uses' => 'MatchController@postMatch'
]);

Route::get('/match/{id}', [
    'middleware' => 'auth',
    'uses' => 'MatchController@getMatchInformation'
]);
Route::post('/match/join', [
    'middleware' => 'auth',
    'uses' => 'MatchController@postJoin'
]);

Route::get('/makerun','SportController@productRuns');
Route::get('/deleterun','SportController@deleteRuns');

Route::get('/sport', [
    'middleware' => 'auth',
    'uses' => 'SportController@getSport'
]);
Route::post('/sport', [
    'middleware' => 'auth',
    'uses' => 'SportController@postSport'
]);