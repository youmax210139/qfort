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

    Route::get('/researches', 'ResearchController@index')->name('researches.index');
    Route::get('/researches/{research}', 'ResearchController@detail')->name('researches.detail');
    Route::get('/researches/domains/{domain}', 'ResearchController@domain')->name('researches.domains.detail');

    Route::get('/peoples', 'PeopleController@index')->name('peoples.index');
    Route::get('/peoples/{people}', 'PeopleController@detail')->name('peoples.detail');
    Route::get('/peoples/{people}/video', 'PeopleController@video')->name('peoples.video');

    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/{event}', 'EventController@detail')->name('events.detail');
    Route::post('events/{event}/register', 'EventController@storeRegistration')->name('events.registration.store');
    Route::get('/events/{event}/register', 'EventController@createRegistration')->name('events.registration.create');

    Route::get('/news', 'NewController@index')->name('news.index');
    Route::get('/news/{article}', 'NewController@detail')->name('news.detail');
    
    Route::get('/abouts/findus', 'AboutController@findus')->name('abouts.findus');
    Route::get('/abouts/followus', 'AboutController@followus')->name('abouts.followus');
    Route::get('/abouts/whoweare', 'AboutController@whoweare')->name('abouts.whoweare');

    Route::get('/searchs', 'SearchController@index')->name('searchs.index');

    Route::post('subscriptions', 'SubscriptionController@store')->name('subscriptions.store');

    Route::post('enquiries', 'enquiryController@store')->name('enquiries.store');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
