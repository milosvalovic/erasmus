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


//Client routes
Route::get('/', 'client\HomeController@home');

Route::get('/mapa/krajiny', 'client\HomeController@getCountryCodes');

Route::get('/#kontakt', 'client\HomeController@home');

Route::post('/hladat', ['as' => 'search', 'uses' => 'client\SearchController@search']);

Route::get('/mobility', 'client\MobilitiesController@mobilities');

Route::get('/mobility/{id}/{perPage}', ['as' => 'mobility', 'uses' => 'client\MobilitiesController@mobilityByType']);

Route::get('/detail/{id}', 'client\DetailController@detail');

Route::post('detail/mobilita/prihlasit', ['as' => 'mobility-signup', 'uses' => 'client\DetailController@signInMobility'])->middleware('auth');

Route::get('/otazky', 'client\FAQController@faq');

Route::get('/clanky/{perPage}', 'blog\BlogController@blog');

Route::get('/clanok/{id}', 'blog\BlogController@article');

Route::get('profil', 'student\ProfileController@mobilities')->middleware('auth');

Route::get('profil/mobility', 'student\ProfileController@mobilities')->middleware('auth');

Route::get('profil/prihlasky', 'student\ProfileController@signups')->middleware('auth');

Route::get('profil/clanok/novy/{users_ID}/{users_season_ID}', 'student\ArticleController@newArticle')->middleware('auth');

Route::post('profil/clanok/ulozit', ['as' => 'insert-article', 'uses' => 'student\ArticleController@insertArticle'])->middleware('auth');

Route::get('profil/prezentacia/nova/{users_season_ID}', 'student\PresentationController@newPresentation')->middleware('auth');

Route::post('profil/prezentacia/ulozit', ['as' => 'insert-presentation', 'uses' => 'student\PresentationController@insertPresentation'])->middleware('auth');

Route::get('profil/recenzia/nova/{users_season_ID}', 'student\ReviewController@newReview')->middleware('auth');

Route::post('profil/recenzia/ulozit', ['as' => 'insert-review', 'uses' => 'student\ReviewController@insertReview'])->middleware('auth');


// Admin routes
Route::get('/admin', 'system\SystemController@system');

Route::get('/admin/users', 'system\UserController@users');

Route::get('/admin/roles', 'system\UserRoleController@roles');

Route::get('/admin/mobilities', 'system\MobilityController@mobilities');

Route::get('/admin/mobilities_category', 'system\CategoryMobilityController@mobility_category');

Route::get('/admin/mobility_type', 'system\TypeMobilityController@mobility_type');

Route::get('/admin/blogs', 'system\BlogController@blog');

Route::get('/admin/universities', 'system\UniversityController@universities');

Route::get('/admin/images', 'system\ImageController@images');

Route::get('/admin/faq', 'system\FaqController@faq');

Route::get('/admin/open_hours', 'system\OfficeHourController@office_hours');


//Auth routes
Route::group(['middleware' => ['web']], function() {

    Route::get('/prihlasovanie', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

    Route::get('/odhlasenie', 'Auth\LoginController@logout')->name('logout');

    Route::get('/registracia', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

    Route::get('pomoc/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('pomoc/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/pomoc/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('pomoc/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});