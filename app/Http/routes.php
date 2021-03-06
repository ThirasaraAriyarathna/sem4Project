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

Route::get('/test', [
    'uses' => 'HomeController@testDB',
    'as' => 'test',
    

]);

Route::post('/testing', [
    'uses' => 'HomeController@testing',
    'as' => 'testing',

]);

Route::post('/login', [
    'uses' => 'HomeController@login',
    'as' => 'login',
]);

Route::get('/loginView', [
    'uses' => 'HomeController@loginView',
    'as' => 'loginView',

]);








