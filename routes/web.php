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
Route::resource('division', 'DivisionController');
Route::resource('rank_salary', 'RankSalaryController');
Route::resource('year', 'YearController');

Route::get('ahp', 'AHPController@get_ahp_matrix_criteria');
Route::get('ahp_summary', 'AHPController@get_ahp_matrix_alternative');
Route::post('test', 'AlternativeController@test');
Route::post('test_update', 'AlternativeController@test_update');
