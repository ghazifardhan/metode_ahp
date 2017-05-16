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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('alternative', 'AlternativeController');
Route::resource('criteria', 'CriteriaController');
Route::resource('criteria_comparison', 'CriteriaComparisonController');

Route::get('ahp', 'AHPController@get_ahp_matrix_criteria');
Route::get('ahp_test', 'AHPController@ahp_get_per_kriteria');
Route::post('test', 'AlternativeController@test');
Route::post('test_update', 'AlternativeController@test_update');
