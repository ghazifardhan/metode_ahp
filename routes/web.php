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

    $title = 'Welcome';
    return view('welcome', compact('title'));
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
Route::get('ahp_summary/{id}', 'AHPController@get_ahp_matrix_alternative')->name('ahp_summary');
Route::post('alternative/{id}/assessment/{year_id}/create_assessment', 'AlternativeController@createAssessment')->name('create.assessment');
Route::post('alternative/{id}/assessment/{year_id}/update_assessment', 'AlternativeController@updateAssessment')->name('update.assessment');
Route::get('alternative/{id}/assessment/{year_id}', 'AlternativeController@showAssessmentForm')->name('alternative.assessment');
