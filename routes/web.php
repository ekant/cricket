<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('match-schedules', 'MatchScheduleController@getAll');

Route::get('points-table', 'GroupsController@getAll');

Route::get('play-match/{match_id}', 'MatchScheduleController@postPlayMatch');

Route::get('match-detail/{match_id}', 'MatchScheduleController@getMatchDetail');
