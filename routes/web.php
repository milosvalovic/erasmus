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

Route::get('/', 'client\HomeController@home');

Route::get('/mobility', 'client\MobilitiesController@mobilities');

Route::get('/detail', 'client\DetailController@detail');

Route::get('/#kontakt', 'client\HomeController@home');

Route::get('/blog', 'blog\BlogController@blog');

Route::get('/article', 'blog\BlogController@article');

Route::get('/faq', 'client\FAQController@faq');

Route::get('/prihlasovanie', 'client\AccountController@login');

Route::get('/registracia', 'client\AccountController@register');

Route::get('/pomoc', 'client\AccountController@forget_password');


// Admin routes
Route::get('/admin', 'system\SystemController@system');

Route::get('/admin/users', 'system\SystemController@users');

Route::get('/admin/mobilities', 'system\SystemController@mobilities');
