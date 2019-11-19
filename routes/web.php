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

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'client\HomeController@home');

Route::get('/mapa/krajiny', 'client\HomeController@getCountryCodes');

Route::get('/#kontakt', 'client\HomeController@home');

Route::post('/hladat', ['as' => 'search', 'uses' => 'client\SearchController@search']);

Route::get('/mobility', 'client\MobilitiesController@mobilities');

Route::get('/mobility/{id}/{perPage}', ['as' => 'mobility', 'uses' => 'client\MobilitiesController@mobilityByType']);

Route::get('/clanok/novy', 'student\ArticleController@newArticle');

Route::post('/clanok/ulozit', ['as' => 'insert-article', 'uses' => 'student\ArticleController@insertArticle']);

Route::get('/prezentacia/nova', 'student\PresentationController@newPresentation');

Route::post('/prezentacia/ulozit', ['as' => 'insert-presentation', 'uses' => 'student\PresentationController@insertPresentation']);

Route::get('/recenzia/nova', 'student\ReviewController@newReview');

Route::post('/recenzia/ulozit', ['as' => 'insert-review', 'uses' => 'student\ReviewController@insertReview']);












Route::get('/detail', 'client\DetailController@detail');

Route::get('/hladat', 'client\SearchController@search');

Route::get('/#contact', 'client\HomeController@home');

Route::get('/blog', 'blog\BlogController@blog');

Route::get('/article', 'blog\BlogController@article');

Route::get('/faq', 'client\FAQController@faq');

Route::get('/odhlasenie', 'client\AccountController@login');

Route::get('/profil', 'student\ProfileController@profil');

Route::get('/profil/prezentacia', 'system\student\ProfileController@presentation');

Route::get('/profil/recenzia', 'system\student\ProfileController@review');

Route::get('/profil/blog', 'system\student\ProfileController@blog');

Route::get('/email/newsletter', function(){
    $to_name="Firstname Lastname";
    $to_email="username@gmail.com";
    $data = array("header" => "", "text" => "", "mobilities"=> array(), "unsubscribe_url"=>"");
    Mail::send('mail.newsletter', $data, function($messeage) use ($to_name, $to_email){
       $messeage->to($to_email)
       ->subject(Lang::get('app.newsletter_title'));
    });
});

Route::get('/email/activate', function(){
    $to_name="Firstname Lastname";
    $to_email="username@gmail.com";
    $data = array("header" => "", "text" => "", "activate_url"=>"");
    Mail::send('mail.activate', $data, function($messeage) use ($to_name, $to_email){
        $messeage->to($to_email)
            ->subject(Lang::get('app.activate_title'));
    });
});

Route::get('/email/reset', function(){
    $to_name="Firstname Lastname";
    $to_email="username@gmail.com";
    $data = array("header" => "", "text" => "", "reset_url"=>"");
    Mail::send('mail.activate', $data, function($messeage) use ($to_name, $to_email){
        $messeage->to($to_email)
            ->subject(Lang::get('app.reset_title'));
    });
});