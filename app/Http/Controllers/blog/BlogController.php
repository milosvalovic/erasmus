<?php

namespace App\Http\Controllers\Blog;


use Illuminate\Routing\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog(){
        return view('client.blog.blog');
    }

    public function article(){
        return view('client.blog.article');
    }

    //Vrati zoznam clankov v blogu
    public function getArticles(){
        $articles = Blog::select('ID','title','status','users_season_ID','created_at')
            ->with([
                'user_season' => function($query){
                    $query->select('ID','users_ID','season_ID');
                },
                'user_season.user' => function($query){
                    $query->select('ID','first_name','last_name');
                },
                'user_season.season' => function($query){
                    $query->select('ID','mobility_ID');
                },
                'user_season.season.mobility' => function($query){
                    $query->select('ID','partner_university_ID');
                },
                'user_season.season.mobility.university' => function($query){
                    $query->select('ID','name','country_ID');
                },
                'user_season.season.mobility.university.country' => function($query){
                    $query->select('ID','name');
                }
            ])
            ->where('status','=','1')
            ->orderBy('created_at','DESC')
            ->get();

        foreach ($articles as $article){
            $i = $article->user_season->season->mobility->university;
            $article->place_name = $i->name.', '.$i->country->name;
        }
        return $articles;
    }

    //Vrati clanok v blogu
    public function getArticle($articleID){
        $article = Blog::select('ID','title','status','users_season_ID','created_at','article')
            ->with([
                'user_season' => function($query){
                    $query->select('ID','users_ID','season_ID');
                },
                'user_season.user' => function($query){
                    $query->select('ID','first_name','last_name');
                },
                'user_season.season' => function($query){
                    $query->select('ID','mobility_ID');
                },
                'user_season.season.mobility' => function($query){
                    $query->select('ID','partner_university_ID');
                },
                'user_season.season.mobility.university' => function($query){
                    $query->select('ID','name','country_ID','img_URL');
                },
                'user_season.season.mobility.university.country' => function($query){
                    $query->select('ID','name');
                }
            ])
            ->where('status','=','1')
            ->where('blog.ID','=',$articleID)
            ->get();

        $i = $article->first()->user_season->season->mobility->university;
        $article->first()->place_name = $i->name.', '.$i->country->name;

        return $article;
    }
}