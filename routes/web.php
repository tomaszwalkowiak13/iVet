<?php

use Illuminate\Support\Facades\{Route, Auth};


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

Route::get('/', 'FrontendController@index')->name('home');
Route::get(trans('routes.services'), 'FrontendController@services')->name('services');
Route::get(trans('routes.contact'), 'FrontendController@contact')->name('contact');
Route::get(trans('routes.offer'), 'FrontendController@offer')->name('offer');
Route::get(trans('routes.article') . '/{id}', 'FrontendController@article')->name('article');
Route::get(trans('routes.person') . '/{id}', 'FrontendController@person')->name('person');
Route::get(trans('routes.privacy_policy'), 'FrontendController@privacy_policy')->name('privacy_policy');

// Auth::routes();
