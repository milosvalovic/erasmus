<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\Mobility;
use App\Models\University;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home(){
        return view('client.app.home');
    }

    //Vr�ti v�etky typy mobil�t vo form�te {N�zov:ID, N�zov:ID}
    public function getTypesOfMobility()
    {
        $mobilityTypes = \DB::table('mobility_types')->pluck('ID','name');

        return $mobilityTypes;
    }

    //Vr�ti N ($limit) najlep�ie hodnoten�ch mobil�t zadan�ho typu mobility
    public function getTopMobilityType($typeID, $limit, $order_by)
    {
        $topMobility = Mobility::select('mobility.ID','mobility.mobility_types_ID','partner_university.img_url','countries.country_name','partner_university.name')
            // function($query){$query->from('comments')->selectRaw('COUNT(comments.ID)');})
            //['count' => \DB::table('comments')->where('comments.mobility_ID', '=', 'mobility.ID')->count()])
            /*['avg' => \DB::table('comments')->selectRaw('avg(rating)')->where('comments.mobility_ID', '=', 'mobility.ID')])*/
            //->addSelect(['count' => Comment::where('comments.mobility_ID','=','mobility.ID')->count()])
            ->selectRaw('(SELECT COUNT(comments.id) FROM comments WHERE comments.mobility_ID = mobility.ID) count')
            ->selectRaw('(SELECT AVG(rating) FROM comments WHERE comments.mobility_ID = mobility.ID) rating ')
            ->selectRaw('min(season.date_end_reg)')
            ->leftJoin('partner_university', 'partner_university.ID', '=', 'mobility.partner_university_ID')
            ->leftJoin('countries', 'countries.ID', '=', 'partner_university.country_ID')
            ->leftJoin('season', 'mobility.ID', '=', 'season.mobility_ID')
            ->leftJoin('comments', 'comments.mobility_ID', '=', 'mobility.ID')
            ->whereRaw( 'curdate() < season.date_end_reg')
            ->where('mobility.deleted_at','=',null)
            ->where('mobility.mobility_types_ID', '=' ,$typeID)
            ->orderBy('rating','desc')
            ->groupBy('mobility.ID')
            ->when($order_by, function ($query, $order_by){
                return $query->orderBy($order_by, 'desc');
            })
            ->when($limit, function ($query, $limit){
                return $query->take($limit);
            })
            ->get();

        return $topMobility;
    }

    //Vr�ti 4 najlep�ie hodnoten� mobility ka�d�ho typu
    public function getTopMobility()
    {
        $limit = 4;
        $order_by = 'rating';


        $types = $this->getTypesOfMobility();
        $arrayFinal = array();

        foreach ($types as $key => $type){
            $mobility =  $this->getTopMobilityType($type,$limit, $order_by);
            if(count($mobility)>0){
                $arrayFinal[$key] = $mobility;
            }
        }

        return $arrayFinal;
    }

    //Vr�ti Country Code pre mapu
    public function getCountryCodes(){
        $countries = University::leftJoin('countries', 'countries.ID', '=', 'partner_university.country_ID')
            ->where('partner_university.deleted_at','=',null)
            ->pluck('country_code');

        return array('countries'=>$countries);
    }

    //Prihl�snie do Newsletteru
    public function signInNewsletter($email){
        $updated = User::where('email', $email)->update(['newsletter' => 1]);

        if($updated>0){
            return $notification=['success:newsletter'];
        }else{
            return $notification=['error:newsletter'];
        }
    }

    //Vr�ti v�etky mobility dan�ho typu
    public function getAllMobilityType($typeID){
        return $this->getTopMobilityType($typeID,'','');
    }


    public function test()
    {

        $order_by = 'comment_count';
        $limit = 3;
        $typeID = 1;

        $test = Mobility::select('ID','mobility_types_ID','partner_university_ID')

            ->with([
            'university' => function($query){
                $query->select('ID','country_ID','name','img_url');
            }
            ,'season' => function($query){
                $query->select('ID','mobility_ID','date_end_reg')->where('date_end_reg','>',Carbon::now(+2));
            }
            ,'university.country' => function($query){
                $query->select('ID','country_name');
            }
            ,'season.user_season' => function($query){
                $query->select('ID','season_ID');
            }
            ,'season.user_season.comment' => function($query){
                $query->select('ID','users_season_ID','rating');
            }])
            ->withCount('comment')
            //->avg('comment.rating')

            ->whereHas('season', function($query) {
                $query->where('season.date_end_reg','>',Carbon::now(+2));
            })
            ->where('mobility_types_ID', '=', $typeID)

            ->has('university')->has('university.country')

            ->when($order_by, function ($query, $order_by){
                $query->orderBy($order_by, 'desc');
            })
            ->when($limit, function ($query, $limit){
                $query->take($limit);
            })
            ->get();

        return $test;
    }
}
