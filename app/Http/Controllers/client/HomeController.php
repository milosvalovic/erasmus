<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Models\Mobility;
use App\Models\University;
use App\Models\Mobility_Type;
use App\Http\Variables;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function home(){
        return view('client.app.home');
    }

    //Vrati vsetky typy mobilit vo formete {Nazov:ID, Nazov:ID}
    public function getTypesOfMobility()
    {
        $mobilityTypes = Mobility_Type::pluck('ID','name');

        return $mobilityTypes;
    }

    //Vrati N ($limit) najlepsie hodnotenych mobilit zadanaho typu mobility
    public function getTopMobilityType($typeID, $limit)
    {
        $offset = Variables::TIME_OFFSET;

        $topMobility = Mobility::select('ID','mobility_types_ID','partner_university_ID')
            ->with([
                'university' => function($query){
                    $query->select('ID','country_ID','name','img_url');
                }
                ,'season' => function($query) use ($offset){
                    $query->select('ID','mobility_ID','date_end_reg')->where('date_end_reg','>',Carbon::now($offset));
                }
                ,'university.country' => function($query){
                    $query->select('ID','name');
                }
                ,'review' => function($query){
                    $query->select('rating');
                }
            ])
            ->withCount('review')

            ->whereHas('season', function($query) use ($offset){
                $query->where('season.date_end_reg','>',Carbon::now($offset));
            })
            ->where('mobility_types_ID', '=', $typeID)

            ->has('university')->has('university.country')

            ->when($limit, function ($query, $limit){
                $query->take($limit);
            })
            ->get();

        return $topMobility;
    }

    //Vrati 4 najlepeie hodnotene mobility kazdeho typu
    public function getTopMobility()
    {
        $limit = Variables::HOME_PAGE_COUNT_MOBILITY;

        $types = $this->getTypesOfMobility();
        $arrayFinal = array();

        foreach ($types as $key => $type){
            $mobility =  $this->getTopMobilityType($type,$limit);

            if(count($mobility)>0){

                foreach ($mobility as $item){
                    $item->review_avg = $item->review->avg('rating');
                }

                $sortedMobility = $mobility->sortByDesc(function($col) {
                    return $col->review_avg;
                })->values();


                $arrayFinal[$key] = $sortedMobility;
            }
        }

        return $arrayFinal;
    }

    //Vrati Country Code pre mapu
    public function getCountryCodes()
    {
        $countries = University::with('country')->get()->pluck('country.country_code');

        return array('countries'=>$countries);
    }

    //Prihlasnie do Newsletteru
    public function signInNewsletter($email)
    {
        $updated = User::where('email', $email)->update(['newsletter' => 1]);

        if($updated>0){
            return $notification=['success:newsletter'];
        }else{
            return $notification=['error:newsletter'];
        }
    }

    //Vrati vsetky mobility daneho typu
    public function getAllMobilityType($typeID)
    {
        $sortedMobility = $this->getTopMobilityType($typeID,'')->sortByDesc(function($col) {
            return $col->date_end_reg;
        })->values();

        return $sortedMobility;
    }
}
