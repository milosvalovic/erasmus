<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mobility;
use App\Models\University;
use App\Models\Country;

class HomeController extends BaseController
{
    //Vráti všetky typy mobilít vo formáte {Názov:ID, Názov:ID}
    public function getTypesOfMobility()
    {
        $mobilityTypes = \DB::table('mobility_types')->pluck('ID','name');

        return $mobilityTypes;
    }

    //Vráti N ($limit) najlepšie hodnotenıch mobilít zadaného typu mobility
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

    //Vráti 4 najlepšie hodnotené mobility kadého typu
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

    //Vráti Country Code pre mapu
    public function getCountryCodes(){
        $countries = University::leftJoin('countries', 'countries.ID', '=', 'partner_university.country_ID')
                                ->where('partner_university.deleted_at','=',null)
                                ->pluck('country_code');

        return array('countries'=>$countries);
    }

    //Prihlásnie do Newsletteru
    public function signInNewsletter($email){
        $updated = User::where('email', $email)->update(['newsletter' => 1]);

        if($updated>0){
             return $notification=['success:newsletter'];
        }else{
             return $notification=['error:newsletter'];
        }
    }

    //Vráti všetky mobility daného typu
    public function getAllMobilityType($typeID){
        return $this->getTopMobilityType($typeID,'','');
    }


    public function test(){
        $test = University::find(1)->country;
        return $test;
    }

}
