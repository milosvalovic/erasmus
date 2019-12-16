<?php

namespace App\Http\Controllers\client;

use App\Models\Mobility;
use App\Http\Variables;
use App\Models\Status_season;
use App\Models\User;
use App\Models\User_Season;
use App\Models\Season;
use App\Models\Season_Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class DetailController extends Controller
{

    public function signInMobilityTest($id)
    {
        if(Auth::check()) {
            $userID = Auth::user()->ID;
            $mobilityID = $id;//$request->input('mobility_id');
            $offset = Variables::TIME_OFFSET;

            $count_pending = 0;
            $count_accept = 0;

            $signIn = Mobility::select('ID')
                ->with([
                    'season' => function ($query) use ($offset) {
                        $query->select('ID', 'date_start_reg', 'date_end_reg', 'count_students', 'count_registrations', 'mobility_ID', 'date_start_mobility', 'date_end_mobility')->where('date_end_reg', '>', Carbon::now($offset))->first();
                    },
                    'season.user_season' => function ($query) {
                        $query->select('ID', 'users_ID', 'season_ID');
                    },
                    'season.user_season.status_season' => function ($query) {
                        $query->select('ID', 'season_status_ID', 'users_season_ID')->orderBy('ID', 'DESC')->first();
                    }
                ])
                ->where('mobility.ID', '=', $mobilityID)
                ->whereHas('season', function ($query) use ($offset) {
                    $query->where('season.date_end_reg', '>', Carbon::now($offset));
                })
                ->get();

            $firstSeason = $signIn->first()->season->first();

            foreach ($firstSeason->user_season as $item) {
                if ($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT) {
                    $count_accept++;
                } else if ($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT) {
                    $count_accept++;
                }
            }

            if ($firstSeason->count_students <= $count_accept) {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error_max')));
            }

            if ($firstSeason->count_registrations != -1 && $firstSeason->count_registrations <= $count_pending + $count_accept) {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error_max')));
            }

            $endMobilityDate = $firstSeason->date_start_mobility;
            $startMobilityDate = $firstSeason->date_end_mobility;
            $idSeason = $firstSeason->ID;

            $userSeasons = User::select('ID')
                ->with([
                    'user_season' => function ($query) use ($idSeason) {
                        $query->select('ID', 'season_ID', 'users_ID');
                    },
                    'user_season.season' => function ($query) use ($endMobilityDate, $startMobilityDate) {
                        $query->select('ID', 'date_start_mobility', 'date_end_mobility')
                            ->where(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '>=', $startMobilityDate)->where('season.date_start_mobility', '<=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '<=', $startMobilityDate)->where('season.date_end_mobility', '>=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '>=', $startMobilityDate)->where('season.date_end_mobility', '<=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_end_mobility', '>=', $startMobilityDate)->where('season.date_end_mobility', '<=', $endMobilityDate);
                            });

                    },
                    'user_season.status_season' => function ($query) use ($idSeason) {
                        $query->select('ID', 'season_status_ID', 'users_season_ID')->orderBy('ID', 'DESC')->first();
                    }])
                ->where('users.ID', '=', $userID)
                ->get();

            $seasons = $userSeasons->first()->user_season;

            foreach ($seasons as $seasonUser) {
                if ($seasonUser->season != null && $seasonUser->status_season->first()->season_status_ID != Variables::SEASON_STATUS_CANCEL_ID) {
                    return json_encode(array('status' => 'error',
                        'reason' => Lang::get('app.detail_sign_up_mobility_error_date')));
                }
            }

            $seasonID = $signIn->first()->season->first()->ID;


            \DB::beginTransaction();
            try {
                $season = Season::find($seasonID);

                $user_season = $season->user_season()->create(array('users_ID' => $userID, 'season_ID' => $seasonID))->id;

                $status_season = new Status_season();
                $status_season->season_status_ID = Variables::SEASON_STATUS_PENDING_ID;
                $status_season->users_ID = '1';
                $status_season->users_season_ID = $user_season;
                $status_season->save();

                \DB::commit();
                return json_encode(array('status' => 'success',
                    'reason' => Lang::get('app.detail_sign_up_mobility_success'),
                    'url' => url('/profil')));
            } catch (\Exception $e) {
                \DB::rollback();
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error')));

            }
        }
    }

    public function detail($id)
    {
        return view('client.app.detail', [
            'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW,
            'number_of_pictures' => Variables::NUMBER_OF_VISIBLE_REVIEW_PICTURES,
            'mobilityDetail' => $this->getMobilityDetail($id),
            'mobilityPrezentations' => $this->getMobilityPrezentations($id),
            'getMobilityImages' => $this->getMobilityImages($id),
            'getMobilityReviews' => $this->getMobilityReviews($id)
        ]);
    }

    private function getMobilityDetail($mobilityID)
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

    private function getMobilityPrezentations($mobilityID)
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

    private function getMobilityReviews($mobilityID)
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
                    $query->select('ID','reviews_ID','url', 'thumb_url');
                }
            ])
            ->where('mobility.ID','=',$mobilityID)
            ->get();

        return $mobilityReviews;
    }

    private function getMobilityImages($mobilityID)
    {
        $mobilityImages = Mobility::select('ID')
            ->with([
                'review' => function($query){
                    $query->select('reviews.ID');
                },
                'review.images' => function($query){
                    $query->select('ID','reviews_ID','url', 'thumb_url');
                }
            ])
            ->where('mobility.ID','=',$mobilityID)
            ->get();

        return $mobilityImages;
    }

    public function signInMobility(Request $request)
    {
        if(Auth::check()) {
            $userID = Auth::user()->ID;
            $mobilityID = $request->input('mobility_id');
            $offset = Variables::TIME_OFFSET;

            $count_pending = 0;
            $count_accept = 0;

            $signIn = Mobility::select('ID')
                ->with([
                    'season' => function ($query) use ($offset) {
                        $query->select('ID', 'date_start_reg', 'date_end_reg', 'count_students', 'count_registrations', 'mobility_ID', 'date_start_mobility', 'date_end_mobility')->where('date_end_reg', '>', Carbon::now($offset))->first();
                    },
                    'season.user_season' => function ($query) {
                        $query->select('ID', 'users_ID', 'season_ID');
                    },
                    'season.user_season.status_season' => function ($query) {
                        $query->select('ID', 'season_status_ID', 'users_season_ID')->orderBy('ID', 'DESC')->first();
                    }
                ])
                ->where('mobility.ID', '=', $mobilityID)
                ->whereHas('season', function ($query) use ($offset) {
                    $query->where('season.date_end_reg', '>', Carbon::now($offset));
                })
                ->get();

            $firstSeason = $signIn->first()->season->first();

            foreach ($firstSeason->user_season as $item) {
                if ($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT) {
                    $count_accept++;
                } else if ($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT) {
                    $count_accept++;
                }
            }

            if ($firstSeason->count_students <= $count_accept) {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error_max')));
            }

            if ($firstSeason->count_registrations != -1 && $firstSeason->count_registrations <= $count_pending + $count_accept) {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error_max')));
            }

            $endMobilityDate = $firstSeason->date_start_mobility;
            $startMobilityDate = $firstSeason->date_end_mobility;
            $idSeason = $firstSeason->ID;

            $userSeasons = User::select('ID')
                ->with([
                    'user_season' => function ($query) use ($idSeason) {
                        $query->select('ID', 'season_ID', 'users_ID');
                    },
                    'user_season.season' => function ($query) use ($endMobilityDate, $startMobilityDate) {
                        $query->select('ID', 'date_start_mobility', 'date_end_mobility')
                            ->where(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '>=', $startMobilityDate)->where('season.date_start_mobility', '<=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '<=', $startMobilityDate)->where('season.date_end_mobility', '>=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_start_mobility', '>=', $startMobilityDate)->where('season.date_end_mobility', '<=', $endMobilityDate);
                            })
                            ->orWhere(function ($query) use ($endMobilityDate, $startMobilityDate) {
                                $query->where('season.date_end_mobility', '>=', $startMobilityDate)->where('season.date_end_mobility', '<=', $endMobilityDate);
                            });

                    },
                    'user_season.status_season' => function ($query) use ($idSeason) {
                        $query->select('ID', 'season_status_ID', 'users_season_ID')->orderBy('ID', 'DESC')->first();
                    }])
                ->where('users.ID', '=', $userID)
                ->get();

            $seasons = $userSeasons->first()->user_season;

            foreach ($seasons as $seasonUser) {
                if ($seasonUser->season != null && $seasonUser->status_season->first()->season_status_ID != Variables::SEASON_STATUS_CANCEL_ID) {
                    return json_encode(array('status' => 'error',
                        'reason' => Lang::get('app.detail_sign_up_mobility_error_date')));
                }
            }

            $seasonID = $signIn->first()->season->first()->ID;


            \DB::beginTransaction();
            try {
                $season = Season::find($seasonID);

                $user_season = $season->user_season()->create(array('users_ID' => $userID, 'season_ID' => $seasonID))->ID;

                $status_season = new Status_season();
                $status_season->season_status_ID = Variables::SEASON_STATUS_PENDING_ID;
                $status_season->users_ID = '1';
                $status_season->users_season_ID = $user_season;
                $status_season->save();


                \DB::commit();
                return json_encode(array('status' => 'success',
                    'reason' => Lang::get('app.detail_sign_up_mobility_success'),
                    'url' => url('/profil/prihlasky')));
            } catch (\Exception $e) {
                \DB::rollback();
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error')));

            }
        }
    }
}