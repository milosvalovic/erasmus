<?php

namespace App\Http\Controllers\Blog;


use App\Http\Variables;
use App\Models\Blog;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function blog($perPage)
    {
        return view('client.blog.blog',
            ['articles' => $this->getArticles($perPage),
             'in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    public function article($articleID)
    {
        return view('client.blog.article',
            ['article' => $this->getArticle($articleID),
             'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    public function getArticles($perPage)
    {
        $articles = Blog::select('ID', 'title', 'status', 'users_season_ID', 'publish_date')
            ->with([
                'user_season' => function ($query) {
                    $query->select('ID', 'users_ID', 'season_ID');
                },
                'user_season.user' => function ($query) {
                    $query->select('ID', 'first_name', 'last_name');
                },
                'user_season.season' => function ($query) {
                    $query->select('ID', 'mobility_ID');
                },
                'user_season.season.mobility' => function ($query) {
                    $query->select('ID', 'partner_university_ID');
                },
                'user_season.season.mobility.university' => function ($query) {
                    $query->select('ID', 'name', 'country_ID');
                },
                'user_season.season.mobility.university.country' => function ($query) {
                    $query->select('ID', 'name');
                }
            ])
            ->where('status', '=', '1')
            ->orderBy('created_at', 'DESC')
            ->take($perPage)
            ->get();

        foreach ($articles as $article) {
            $i = $article->user_season->season->mobility->university;
            $article->place_name = $i->name . ', ' . $i->country->name;
        }
        return $articles;
    }

    //Vrati clanok v blogu
    public function getArticle($articleID)
    {
        $article = Blog::select('ID', 'title', 'status', 'users_season_ID', 'publish_date', 'article')
            ->with([
                'user_season' => function ($query) {
                    $query->select('ID', 'users_ID', 'season_ID');
                },
                'user_season.user' => function ($query) {
                    $query->select('ID', 'first_name', 'last_name');
                },
                'user_season.season' => function ($query) {
                    $query->select('ID', 'mobility_ID');
                },
                'user_season.season.mobility' => function ($query) {
                    $query->select('ID', 'partner_university_ID');
                },
                'user_season.season.mobility.university' => function ($query) {
                    $query->select('ID', 'name', 'country_ID', 'img_URL');
                },
                'user_season.season.mobility.university.country' => function ($query) {
                    $query->select('ID', 'name');
                }
            ])
            ->where('status', '=', '1')
            ->where('blog.ID', '=', $articleID)
            ->get();

        $i = $article->first()->user_season->season->mobility->university;
        $article->first()->place_name = $i->name . ', ' . $i->country->name;

        return $article;
    }
}