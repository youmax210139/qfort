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
    
});

Route::get('/abouts', function () {
    return view('web.index');
});

Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/researchs', 'ResearchController@index')->name('researchs.index');
    Route::get('/researchs/{id}', 'ResearchController@detail')->name('researchs.detail');
    Route::get('/researchs/outcomes/{id}', 'ResearchController@outcome')->name('researchs.outcome');

    Route::get('/peoples', 'PeopleController@index')->name('peoples.index');
    Route::get('/peoples/{people}', 'PeopleController@detail')->name('peoples.detail');

    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/{id}', 'EventController@detail')->name('events.detail');

    Route::get('/news', 'NewController@index')->name('news.index');
    Route::get('/news/{article}', 'NewController@detail')->name('news.detail');
    
    Route::get('/abouts/findus', 'AboutController@findus')->name('abouts.findus');
    Route::get('/abouts/followus', 'AboutController@followus')->name('abouts.followus');
    Route::get('/abouts/whoweare', 'AboutController@whoweare')->name('abouts.whoweare');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
