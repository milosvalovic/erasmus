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

Route::get('/mapa/krajiny', 'client\HomeController@getCountryCodes');

Route::get('/#kontakt', 'client\HomeController@home');

Route::post('/hladat', ['as' => 'search', 'uses' => 'client\SearchController@search']);

Route::get('/mobility', 'client\MobilitiesController@mobilities');

Route::get('/mobility/{id}/{perPage}', ['as' => 'mobility', 'uses' => 'client\MobilitiesController@mobilityByType']);

Route::get('/otazky', 'client\FAQController@faq');

Route::get('profil/mobility', 'student\ProfileController@mobilities');

Route::get('profil/prihlasky', 'student\ProfileController@signups');

Route::get('profil/clanok/novy', 'student\ArticleController@newArticle');

Route::post('profil/clanok/ulozit', ['as' => 'insert-article', 'uses' => 'student\ArticleController@insertArticle']);

Route::get('profil/prezentacia/nova', 'student\PresentationController@newPresentation');

Route::post('profil/prezentacia/ulozit', ['as' => 'insert-presentation', 'uses' => 'student\PresentationController@insertPresentation']);

Route::get('profil/recenzia/nova', 'student\ReviewController@newReview');

Route::post('profil/recenzia/ulozit', ['as' => 'insert-review', 'uses' => 'student\ReviewController@insertReview']);

//Route::get('/detail', 'client\DetailController@detail');
//
//Route::get('/hladat', 'client\SearchController@search');
//
//Route::get('/#contact', 'client\HomeController@home');
//
//Route::get('/blog', 'blog\BlogController@blog');
//
//Route::get('/article', 'blog\BlogController@article');
//
//
//Route::get('/odhlasenie', 'client\AccountController@login');
//
//Route::get('/profil', 'student\ProfileController@profil');
//
//Route::get('/profil/prezentacia', 'system\student\ProfileController@presentation');
//
//Route::get('/profil/recenzia', 'system\student\ProfileController@review');
//
//Route::get('/profil/blog', 'system\student\ProfileController@blog');
//
//Route::get('/email/newsletter', function () {
//    $to_name = "Firstname Lastname";
//    $to_email = "username@gmail.com";
//    $data = array("header" => "", "text" => "", "mobilities" => array(), "unsubscribe_url" => "");
//    Mail::send('mail.newsletter', $data, function ($messeage) use ($to_name, $to_email) {
//        $messeage->to($to_email)
//            ->subject(Lang::get('app.newsletter_title'));
//    });
//});
//
//Route::get('/email/activate', function () {
//    $to_name = "Firstname Lastname";
//    $to_email = "username@gmail.com";
//    $data = array("header" => "", "text" => "", "activate_url" => "");
//    Mail::send('mail.activate', $data, function ($messeage) use ($to_name, $to_email) {
//        $messeage->to($to_email)
//            ->subject(Lang::get('app.activate_title'));
//    });
//});
//
//Route::get('/email/reset', function () {
//    $to_name = "Firstname Lastname";
//    $to_email = "username@gmail.com";
//    $data = array("header" => "", "text" => "", "reset_url" => "");
//    Mail::send('mail.activate', $data, function ($messeage) use ($to_name, $to_email) {
//        $messeage->to($to_email)
//            ->subject(Lang::get('app.reset_title'));
//    });
//});

// Admin routes
Route::get('/admin', 'system\SystemController@system');

Route::get('/admin/users', 'system\UserController@users');

Route::get('/admin/roles', 'system\UserRoleController@roles');

Route::get('/admin/mobilities', 'system\MobilityController@mobilities');

Route::get('/admin/mobilities_category', 'system\CategoryMobilityController@mobility_category');

Route::get('/admin/blogs', 'system\BlogController@blog');

Route::get('/admin/universities', 'system\UniversityController@universities');

Route::get('/admin/images', 'system\ImageController@images');

Route::get('/admin/faq', 'system\FaqController@faq');

Route::get('/admin/open_hours', 'system\OfficeHourController@office_hours');




Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('/prihlasovanie', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

    Route::get('/odhlasenie', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    Route::get('/registracia', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

// Password Reset Routes...
    /*Route::get('/pomoc', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('/password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('/pomoc/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('/password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);*/

    Route::get('pomoc/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('pomoc/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/pomoc/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('pomoc/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});