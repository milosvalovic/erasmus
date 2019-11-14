<?php

namespace App\Http\Controllers\client;

use App\Models\Mobility;
use App\Http\Variables;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class DetailController extends Controller
{
    public function detail(){
        return view('client.app.detail');
    }

    //Vrati vsetky informacie o mobilite
    public function getMobilityDetail($mobilityID)
    {
        $offset = Variables::TIME_OFFSET;

        $mobilityDetail = Mobility::select('ID','mobility_types_ID','partner_university_ID','info','category_ID')
            ->with([
                'university' => function($query){
                    $query->select('ID','country_ID','name','img_url','info');
                }
                ,'season' => function($query) use ($offset){
                    $query->select('ID','mobility_ID','date_end_reg','date_start_mobility','date_end_mobility')->where('date_end_reg','>',Carbon::now($offset));
                }
                ,'mobility_type' => function($query){
                    $query->select('ID','name');
                }
                ,'category' => function($query){
                    $query->select('ID','name');
                }
                ,'university.country' => function($query){
                    $query->select('ID','name');
            }])

            ->where('ID', $mobilityID)
            ->has('university')->has('university.country')
            ->get();

        foreach ($mobilityDetail as $item) {
            $item->title = $item->mobility_type->name.': '.$item->university->name;
        }

        return $mobilityDetail;
    }

    //Vrati tabulku prezentacie pre mobilitu
    public function getMobilityPrezentations($mobilityID)
    {

    }

    //Vráti obrázky
    public function getMobilityImages($mobilityID)
    {
        $mobilityImages = Mobility::select('ID')
            ->with([
                'review' => function($query){
                    $query->select('*');
                },
                'review.images' => function($query){
                    $query->select('ID','reviews_ID','url');
                }
            ])
            ->where('mobility.ID','=',$mobilityID)
            ->get();

        return $mobilityImages;
    }

    //Vráti recenzie
    public function getMobilityReviews($mobilityID)
    {
        $mobilityReviews = Mobility::select('ID')
            ->with([
                'review' => function($query){
                    $query->select('*');
                },
                'review.user_season' => function($query){
                    $query->select('ID','users_ID');
                },
                'review.user_season.user' => function($query){
                    $query->select('ID','first_name','last_name');
                },
                'review.images' => function($query){
                    $query->select('ID','reviews_ID','url');
                }
                ])
            ->where('mobility.ID','=',$mobilityID)
            ->get();


        return $mobilityReviews;
    }
}