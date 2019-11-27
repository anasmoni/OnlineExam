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
    //return view('welcome');
    return view('HomePage');
});

Auth::routes();
Route::get('/addmcq', 'addMCQController@index')->name('AddMCQ'); //link -> /addmcq , rout->AddMCQ
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/mcqInsert', 'addMCQController@InsertMCQ');
Route::get('/setModelTest', 'setMTestController@index')->name('setMTest');
Route::post('/setMTestInsert', 'setMTestController@InsertMCQSheet');
Route::post('/myexams','ExamController@show');
Route::get('/ShowQuestions','QuestionController@show');
Route::get('/testing',function(){
	return view('Timer');
});

Route::get('/users', 'ShowUsersController@show')->name('users');

Route::post('/FilterQBank', 'FilterQBankController@Filter');
Route::get('/ShowQBank', 'FilterQBankController@show')->name('show');

Route::get('/ShowAnsSheet', 'QuestionController@InsertAnsSheet')->name('InsertAnsSheet');
Route::post('/ansSheetInsert', 'QuestionController@InsertAnsSheet')->name('InsertAnsSheet');
Route::get('/showParticipations','ParticipationhistoryController@Show')->name('MyParticipations');
Route::get('/AddSubject','SubjectTopicController@show')->name('addSubject');
Route::post('/TestSubject','SubjectTopicController@index');
Route::post('/ShowScript','ScriptController@show');

Route::get('/kidszone','DrawController@show')->name('draw');
Route::get('/test1','ParticipationhistoryController@show1')->name('show1');
Route::get('/myScript','ParticipationhistoryController@show')->name('script');
Route::post('/test2','ParticipationhistoryController@filter');
Route::get('/showprofile/{name?}','ProfileController@show')->name('myprofile');

Route::get('/hexagone','GeometryController@hexagone')->name('hexagone');
Route::get('/triangle','GeometryController@triangle');
Route::get('/triangle0','GeometryController@triangle0');