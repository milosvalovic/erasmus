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


/*------------------------------- Admin routes---------------------------------------------------------------------------------------------------------------------*/
Route::get('/admin', 'system\SystemController@system');

/*------User routes-------------*/
Route::get('/admin/users', 'system\UserController@users');
Route::get('/admin/users/edit_user/{id}', ['as' => 'edit_user_form', 'uses' => 'system\UserController@userEditShow']);
Route::post('/admin/users/add_user', 'system\UserController@addUser')->name('addUser');
Route::post('/admin/users/edit_user', 'system\UserController@editUser')->name('editUser');
Route::get('/admin/users/delete/{id}', 'system\UserController@deleteUser')->name('deleteUser');

/*------Roles-------------------*/
Route::get('/admin/roles', 'system\UserRoleController@roles');
Route::get('/admin/roles/edit_role/{id}', ['as' => 'edit_role_form', 'uses' => 'system\UserRoleController@userRoleEditShow']);

/*------Mobility----------------*/
Route::get('/admin/mobilities', 'system\MobilityController@mobilities');

/*------Mobility category-------*/
Route::get('/admin/mobilities_category', 'system\CategoryMobilityController@mobility_category');
Route::get('/admin/mobilities_category/edit_mobility/{id}', ['as' => 'edit_mobility', 'uses' => 'system\CategoryMobilityController@mobilityCategoryShow']);
Route::post('/admin/mobilities_category/add_mobility', 'system\CategoryMobilityController@addNewCategory');
Route::post('/admin/mobilities_category/edit_mobility', 'system\CategoryMobilityController@editCategory')->name('editCategory');
Route::get('/admin/mobilities_category/delete/{id}', 'system\CategoryMobilityController@deleteCategory')->name('deleteCategory');

/*------Mobility type---------*/
Route::get('/admin/mobility_type', 'system\TypeMobilityController@mobility_type');
Route::get('/admin/mobility_type/edit_mobility/{id}', ['as' => 'edit_type', 'uses' => 'system\TypeMobilityController@mobilityTypeShowEdit']);
Route::post('/admin/mobility_type/add_type/', ['as' => 'add_type', 'uses' => 'system\TypeMobilityController@addType']);
Route::get('/admin/mobility_type/delete_type/{id}', ['as' => 'delete_type', 'uses' => 'system\TypeMobilityController@deleteType']);
Route::post('/admin/mobility_type/edit_type/', ['as' => 'edit_type', 'uses' => 'system\TypeMobilityController@editType']);

/*------Blog---------*/
Route::get('/admin/blogs', 'system\BlogController@blog');
Route::get('/admin/blogs/edit_blog/{id}', ['as' => 'edit_blog_form', 'uses' => 'system\BlogController@blogEditShow']);

/*------University-------------*/
Route::get('/admin/universities', 'system\UniversityController@universities');
Route::get('/admin/universities/edit_university/{id}', ['as' => 'edit_university_form', 'uses' => 'system\UniversityController@universityEditShow']);
Route::get('/admin/universities/delete_university/{id}', ['as' => 'delete_university', 'uses' => 'system\UniversityController@deleteUniversity']);
Route::post('/admin/universities/add_university/', ['as' => 'add_university', 'uses' => 'system\UniversityController@addUniversity']);
Route::post('/admin/universities/edit_university/', ['as' => 'edit_university', 'uses' => 'system\UniversityController@editUniversity']);

/*------Images----------------*/
Route::get('/admin/images', 'system\ImageController@images');

/*------FAQ-------------------*/
Route::get('/admin/faq', 'system\FaqController@faq');
Route::get('/admin/faq/edit_faq/{id}', ['as' => 'edit_faq_form', 'uses' => 'system\FaqController@faqEditShow']);

/*------Office hour-----------*/
Route::get('/admin/open_hours', 'system\OfficeHourController@office_hours');
Route::get('/admin/open_hours/edit_hour/{id}', ['as' => 'edit_office_hour', 'uses' => 'system\OfficeHourController@office_hourEditShow']);

/*------Office hour-----------*/
Route::get('/admin/countries', 'system\CountryController@countries');

//Auth routes
Route::group(['middleware' => ['web']], function () {

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