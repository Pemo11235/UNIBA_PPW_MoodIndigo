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
    return view('welcome', ['title' => 'Welcome']);
});
Route::view('/welcome', 'welcome');

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/offline', function () {
    return view('offline');
});

Route::get('/analisi', function () {
    return view('analysis.index');
});

Route::get('/import', function () {
    return view('csv.import');
});

Route::get('/import', 'CsvEmozioniController@getImport')->name('import');
Route::post('/import_parse', 'CsvEmozioniController@parseImport')->name('import_parse');

Route::resource('projects', 'ProjectsController');
Route::resource('analysis', 'AnalysisController');
//Route::resource('csv_emozioni', 'CsvEmozioniController');
Auth::routes();


