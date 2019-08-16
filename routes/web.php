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
    // Route::get('/', 'IndexController@index')->name('web.index');

    // Route::group(['prefix' => 'articles'], function () {
    //     Route::get('/', 'ArticleController@index')->name('web.articles.index');
    // });
    // Route::group(['prefix' => 'article'], function () {
    //     Route::get('/{slug}', 'ArticleController@details')->name('web.article.details');
    // });

    Route::get('/people', 'PeopleController@index')->name('people');
    Route::get('/people/{id}', 'PeopleController@persion')->name('person');
    Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/services', 'IndexController@service')->name('web.services');
    // Route::get('/contact-us', 'IndexController@contactus')->name('web.contact-us');
    // Route::post('/contact-us/submit', 'IndexController@submitContactUsForm')->name('web.contact-us.submit');

    // Route::get('socialite', 'SocialiteController@socialite')->name('web.socialite');
    // Route::get('socialite/callback/{type}', 'SocialiteController@callback')->name('web.socialite.callback');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
