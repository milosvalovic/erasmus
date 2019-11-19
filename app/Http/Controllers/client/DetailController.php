<?php

namespace App\Http\Controllers\client;

use App\Models\Mobility;
use App\Http\Variables;
use App\Models\Status_season;
use App\Models\User;
use App\Models\Season_Status;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class DetailController extends Controller
{
    public function detail()
    {
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
                    $query->select('ID','mobility_ID','date_end_reg','date_start_mobility','date_end_mobility')->where('date_end_reg','>',Carbon::now($offset))->first();
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

        $firstMobility = $mobilityDetail->first();
        $firstMobility->title = $firstMobility->mobility_type->name.': '.$firstMobility->university->name.', '.$firstMobility->university->country->name;

            if($firstMobility->season->count() == 0){
                $firstMobility->attend = 0;
            }else{
                $firstMobility->attend = 1;
            }
            
        return $mobilityDetail;
    }

    //Vrati tabulku prezentacie pre mobilitu
    public function getMobilityPrezentations($mobilityID)
    {
        $mobilityPresentations = Mobility::select('ID')
            ->with([
                'presentation' => function($query){
                    $query->select('*');
                },
                'presentation.user_season' => function($query){
                    $query->select('ID','users_ID');
                },
                'presentation.user_season.user' => function($query){
                    $query->select('ID','first_name','last_name');
                }
            ])
            ->where('mobility.ID','=',$mobilityID)
            ->get();

        return $mobilityPresentations;
    }


    //Vrati recenzie a obrazky
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

    //Prihlasit sa na mobilitu
    public function signInMobility($mobilityID)
    {
        $userID = 1; //Upraviť na - Ak je prihlásený
        $offset = Variables::TIME_OFFSET;

        $count_pending = 0;
        $count_accept = 0;

        $signIn = Mobility::select('ID')
            ->with([
                'season' => function($query) use ($offset){
                    $query->select('ID','date_start_reg','date_end_reg','count_students','count_registrations','mobility_ID','date_start_mobility','date_end_mobility')->where('date_end_reg','>',Carbon::now($offset))->first();
                },
                'season.user_season' => function($query){
                    $query->select('ID','users_ID','season_ID');
                },
                'season.user_season.status_season' => function($query){
                    $query->select('ID','season_status_ID','users_season_ID')->orderBy('ID','DESC')->first();
                }
            ])
            ->where('mobility.ID','=',$mobilityID)
            ->whereHas('season', function($query) use ($offset){
                $query->where('season.date_end_reg','>',Carbon::now($offset));
            })
            ->get();

        $firstSeason = $signIn->first()->season->first();

        foreach ($firstSeason->user_season as $item){
            if($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT){
                $count_accept++;
            }else if($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT){
                $count_accept++;
            }
        }

        if($firstSeason->count_students <= $count_accept){
            return 'error:student_limit'; //Neda sa prihlasit, pocet prihlasenych studentov dostiahol maximum
        }

        if($firstSeason->count_registrations != -1 && $firstSeason->count_registrations <= $count_pending+$count_accept){
           return 'error:student_limit';
        }

        $endMobilityDate = $firstSeason->date_start_mobility;
        $startMobilityDate = $firstSeason->date_end_mobility;
        $idSeason = $firstSeason->ID;

        $userSeasons = User::select('ID')
            ->with([
                'user_season' => function($query) use ($idSeason){
                    $query->select('ID','season_ID','users_ID');
                },
                'user_season.season' => function($query) use ($endMobilityDate, $startMobilityDate){
                    $query->select('ID','date_start_mobility','date_end_mobility')
                        ->where(function ($query) use ($endMobilityDate, $startMobilityDate){
                            $query->where('season.date_start_mobility','>=',$startMobilityDate)->where('season.date_start_mobility','<=',$endMobilityDate);
                        })
                        ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate){
                            $query->where('season.date_start_mobility','<=',$startMobilityDate)->where('season.date_end_mobility','>=',$endMobilityDate);
                        })
                        ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate){
                            $query->where('season.date_start_mobility','>=',$startMobilityDate)->where('season.date_end_mobility','<=',$endMobilityDate);
                        })
                        ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate){
                            $query->where('season.date_end_mobility','>=',$startMobilityDate)->where('season.date_end_mobility','<=',$endMobilityDate);
                        });

                },
                'user_season.status_season' => function($query) use ($idSeason){
                    $query->select('ID','season_status_ID','users_season_ID')->orderBy('ID','DESC')->first();
                }])
            ->where('users.ID','=',$userID)
            ->get();

        $seasons = $userSeasons->first()->user_season;

        foreach ($seasons as $seasonUser){
            if($seasonUser->season !=null && $seasonUser->status_season->first()->season_status_ID != Variables::SEASON_STATUS_CANCEL_ID) {
                return 'error:season_in_date'; //Pocat tohto datumu prebieha ina mobilita na ktorej je prihlaseny / alebo je prihlaseny uz na danej mobilite
            }
        }

        $seasonID = $signIn->first()->season->first()->ID;

        \DB::beginTransaction();
        try{
            $user = User::find($userID);
            $user_season = $user->user_season()->create(array('users_ID' => $userID, 'season_ID' => $seasonID))->id;


            $season_status = Season_Status::find(Variables::SEASON_STATUS_PENDING_ID);
            $system = User::find(1);

            $status_season = new Status_season(['season_status_ID' => Variables::SEASON_STATUS_PENDING_ID,'users_ID' => $system, 'users_season_ID' =>$user_season]);

            $status_season->season_status()->associate($season_status);
            $status_season->user_season()->associate($user_season);
            $status_season->user()->associate($system);

            $status_season->save();

            \DB::commit();
            return 'success:sign_in_mobility'; //Pouzivatel sa uspesne prihlasil do mobility
        }catch (\Exception $e){
            \DB::rollback();
            return 'error:sign_in_mobility'; //Nieco sa pokazilo.. Skuste to prosim neskor.
        }
    }
}