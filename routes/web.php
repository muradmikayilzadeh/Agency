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

Route::get('/', 'Frontend\PageController@index');
Route::get('set/locale/{locale}','HomeController@set_locale')->name('set_locale');
// ------------ Admin Routes -------------------------------
Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::get('/dashboard','Backend\PageController@index')->name('dashboard');
    Route::get('/add','Backend\PageController@add_data')->name('add_data');
    Route::get('/get-language/{folder}/{file}','Backend\PageController@get_language')->name('get_language');
    Route::post('/get-language/{folder}/{file}','Backend\PageController@set_language')->name('set_language');
    Route::resource('post', 'Backend\PostController');
    Route::resource('team', 'Backend\TeamController');
    Route::resource('setting', 'Backend\SettingController');
    Route::resource('question', 'Backend\QuestionController');
    Route::resource('category', 'Backend\CategoryController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('work', 'Backend\WorkController');
    Route::resource('work-tag', 'Backend\WorkTagController');
    Route::resource('feature', 'Backend\FeatureController');
    Route::resource('social', 'Backend\SocialController');
    Route::resource('statistic', 'Backend\StatisticController');
});

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

