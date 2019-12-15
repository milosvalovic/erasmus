<?php

namespace App\Http\Controllers\system;


use App\Exports\SeasonExport;
use App\Exports\User_SeasonExport;
use App\Http\Variables;
use App\Mail\NewsletterMail;
use App\Mail\StatusChangedEmail;
use App\Models\Category;
use App\Models\Mobility;
use App\Models\Mobility_Type;
use App\Models\Season_status;
use App\Models\Status_season;
use App\Models\University;
use App\Models\User;
use App\Models\User_season;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Season;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SeasonController extends Controller
{
    public function season()
    {
        $universities = University::has('country')->get();
        $categories = Category::all();
        $mobility_type = Mobility_Type::All();
        return view('system.season_admin', ['universities' => $universities, 'categories' => $categories, 'types' => $mobility_type]);
    }

    public function newSeasonShow()
    {
        $mobilities = Mobility::has('mobility_type')->has('category')->has('university')->has('country')->get();
        return view('system.add.season_add', ['mobilities' => $mobilities]);
    }

    public function addSeason(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }
        $mobility_ids = $request->input('mobility_ID');
        $date_start_req = $request->input('date_start_reg');
        $date_end_req = $request->input('date_end_reg');
        $count_student = $request->input('count_students');
        $count_registrations = $request->input('count_registrations');
        $date_start_mobility = $request->input('date_start_mobility');
        $date_end_mobility = $request->input('date_end_mobility');
        $arr = [
            'mobility_ID' => $mobility_ids,
            'date_start_reg' => date("Y-m-d", strtotime($date_start_req)),
            'date_end_reg' => date("Y-m-d", strtotime($date_end_req)),
            'count_students' => $count_student,
            'count_registrations' => $count_registrations,
            'date_start_mobility' => date("Y-m-d", strtotime($date_start_mobility)),
            'date_end_mobility' => date("Y-m-d", strtotime($date_end_mobility))
        ];
        Season::create($arr);

    }

    public function sendNewsletter(Request $request)
    {
        $ids = $request->input('season_ids');
        if ($ids == null) return ['result' => 'Nevybrali ste žiadné sezóny pre newsletter'];
        $seasons = Season::with(['mobility' => function ($season) use (&$request) {

        }, 'university' => function ($season) use (&$request) {

        }, 'country' => function ($season) use (&$request) {

        }, 'mobility.mobility_type' => function ($season) use (&$request) {

        }, 'mobility.category' => function ($season) use (&$request) {

        }])->findMany($ids);
        $users = User::select('ID', 'email', 'hash')->where('newsletter', 1)->get();

        $seasonObject = new \stdClass();
        $seasonObject->seasons = $seasons;
        foreach ($users->toArray() as $user) {
            $seasonObject = new \stdClass();
            $seasonObject->seasons = $seasons->toArray();
//            var_dump($seasons->toJson());
//            die;
            $seasonObject->unsubscribe = url('/').'/novinky/'.$user['email'] . '/'. $user['hash'];
            Mail::to($user['email'])->send(new NewsletterMail($seasonObject));
        }
        return ['result' => 'Newsletter bol úspešne odoslaný'];
    }


    public function sortSeasons(Request $request)
    {

        $universitySearch = $request->input('university');
        $from = ($request->input('from') == '') ? '' : date("Y-m-d", strtotime($request->input('from')));
        $to = ($request->input('to') == '') ? '' : date("Y-m-d", strtotime($request->input('to')));
        $sortBy = $request->input('sortBy');
        $sortType = $request->input('sortType');
        $active = $request->input('active');
        $type = $request->input('type');
        $category = $request->input('category');
        $page = $request->input('page');
        $deleted = $request->input('deleted');
        $onlyDeleted = $request->input('only_deleted');
        $sort = null;
        if ($sortBy && $sortType) $sort = true;
        if (Auth::user()->roles_ID == 3 && $deleted == 1) {
            $seasons = Season::with(['mobility' => function ($season) use (&$request) {

            }, 'university' => function ($season) use (&$request) {

            }, 'country' => function ($season) use (&$request) {

            }, 'mobility.mobility_type' => function ($season) use (&$request) {

            }, 'mobility.category' => function ($season) use (&$request) {

            }])->when($universitySearch, function ($query) use ($universitySearch) {
                return $query->whereHas('university', function ($query) use ($universitySearch) {
                    $query->where('partner_university.ID', '=', $universitySearch);
                });
            })
                ->when($type, function ($query) use ($type) {
                    return $query->whereHas('mobility.mobility_type', function ($query) use ($type) {
                        $query->where('mobility_types.ID', '=', $type);
                    });
                })->when($category, function ($query) use ($category) {
                    return $query->whereHas('mobility.category', function ($query) use ($category) {
                        $query->where('category.ID', '=', $category);
                    });
                })
                ->when($sort, function ($query) use ($sortBy, $sortType) {
                    if ($sortBy == 'university') {
                        $query->orderBy('name', $sortType);
                    } else {
                        $query->orderBy($sortBy, $sortType);
                    }
                })
                ->when($from, function ($query) use ($from) {
                    $query->where('date_start_reg', '>=', $from);
                })
                ->when($to, function ($query) use ($to) {
                    $query->where('date_end_mobility', '<=', $to);
                })
                ->when($active, function ($query) {
                    $query->where('date_end_mobility', '>=', date("Y.m.d"));
                })->withTrashed()->skip($page * 15)->take(15)->get();
        } elseif (Auth::user()->roles_ID == 3 && $onlyDeleted == 1) {
            $seasons = Season::with(['mobility' => function ($season) use (&$request) {

            }, 'university' => function ($season) use (&$request) {

            }, 'country' => function ($season) use (&$request) {

            }, 'mobility.mobility_type' => function ($season) use (&$request) {

            }, 'mobility.category' => function ($season) use (&$request) {

            }])->when($universitySearch, function ($query) use ($universitySearch) {
                return $query->whereHas('university', function ($query) use ($universitySearch) {
                    $query->where('partner_university.ID', '=', $universitySearch);
                });
            })
                ->when($type, function ($query) use ($type) {
                    return $query->whereHas('mobility.mobility_type', function ($query) use ($type) {
                        $query->where('mobility_types.ID', '=', $type);
                    });
                })->when($category, function ($query) use ($category) {
                    return $query->whereHas('mobility.category', function ($query) use ($category) {
                        $query->where('category.ID', '=', $category);
                    });
                })
                ->when($sort, function ($query) use ($sortBy, $sortType) {
                    if ($sortBy == 'university') {
                        $query->orderBy('name', $sortType);
                    } else {
                        $query->orderBy($sortBy, $sortType);
                    }
                })
                ->when($from, function ($query) use ($from) {
                    $query->where('date_start_reg', '>=', $from);
                })
                ->when($to, function ($query) use ($to) {
                    $query->where('date_end_mobility', '<=', $to);
                })
                ->when($active, function ($query) {
                    $query->where('date_end_mobility', '>=', date("Y.m.d"));
                })->onlyTrashed()->skip($page * 15)->take(15)->get();
        } else {
            $seasons = Season::with(['mobility' => function ($season) use (&$request) {

            }, 'university' => function ($season) use (&$request) {

            }, 'country' => function ($season) use (&$request) {

            }, 'mobility.mobility_type' => function ($season) use (&$request) {

            }, 'mobility.category' => function ($season) use (&$request) {

            }])->when($universitySearch, function ($query) use ($universitySearch) {
                return $query->whereHas('university', function ($query) use ($universitySearch) {
                    $query->where('partner_university.ID', '=', $universitySearch);
                });
            })
                ->when($type, function ($query) use ($type) {
                    return $query->whereHas('mobility.mobility_type', function ($query) use ($type) {
                        $query->where('mobility_types.ID', '=', $type);
                    });
                })->when($category, function ($query) use ($category) {
                    return $query->whereHas('mobility.category', function ($query) use ($category) {
                        $query->where('category.ID', '=', $category);
                    });
                })
                ->when($sort, function ($query) use ($sortBy, $sortType) {
                    if ($sortBy == 'university') {
                        $query->orderBy('name', $sortType);
                    } else {
                        $query->orderBy($sortBy, $sortType);
                    }
                })
                ->when($from, function ($query) use ($from) {
                    $query->where('date_start_reg', '>=', $from);
                })
                ->when($to, function ($query) use ($to) {
                    $query->where('date_end_mobility', '<=', $to);
                })
                ->when($active, function ($query) {
                    $query->where('date_end_mobility', '>=', date("Y.m.d"));
                })->skip($page * 15)->take(15)->get();
        }

        $seasons = $seasons->toArray();
        $result = [];
        foreach ($seasons as $season) {
            if ($season['mobility'] != null && $season['university'] != null) {
                $season['date_start_reg'] = date("d.m.Y", strtotime($season['date_start_reg']));
                $season['date_end_reg'] = date("d.m.Y", strtotime($season['date_end_reg']));
                $season['date_start_mobility'] = date("d.m.Y", strtotime($season['date_start_mobility']));
                $season['date_end_mobility'] = date("d.m.Y", strtotime($season['date_end_mobility']));
                $result[] = $season;
            }


        }
        return json_encode($result);
    }

    public function multiAddSeasonsShow(Request $request)
    {
        $seasons_ids = $request->input('season_ids');
        if ($seasons_ids == null) {
            Session::flash('error', Lang::get('system.no_seasons_selected'));
            return redirect()->back()->withInput();
        }
        $seasons = Season::has('mobility')->has('university')->has('country')->has('mobility.mobility_type')->has('mobility.category')->find($seasons_ids);
        $request = null;
        return view('system.extend_season_admin', ['seasons' => $seasons]);
    }

    public function multiAddSeasons(Request $request)
    {
        $validation = $this->validateMultiCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }
        $mobility_ids = $request->input('mobility_ID');
        $date_start_req = $request->input('date_start_reg');
        $date_end_req = $request->input('date_end_reg');
        $count_student = $request->input('count_students');
        $count_registrations = $request->input('count_registrations');
        $date_start_mobility = $request->input('date_start_mobility');
        $date_end_mobility = $request->input('date_end_mobility');

        for ($i = 0; $i < sizeof($mobility_ids); $i++) {
            $arr = [
                'mobility_ID' => $mobility_ids[$i],
                'date_start_reg' => date("Y-m-d", strtotime($date_start_req[$i])),
                'date_end_reg' => date("Y-m-d", strtotime($date_end_req[$i])),
                'count_students' => $count_student[$i],
                'count_registrations' => $count_registrations[$i],
                'date_start_mobility' => date("Y-m-d", strtotime($date_start_mobility[$i])),
                'date_end_mobility' => date("Y-m-d", strtotime($date_end_mobility[$i]))
            ];
            Season::create($arr);
        }
        return redirect('/admin/season');
    }

    public function validateMultiCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'mobility_ID.*' => 'required',
            'date_start_reg.*' => 'required|date',
            'date_end_reg.*' => 'required|date|after:date_start_reg.*',
            'count_students.*' => 'required|numeric',
            'count_registrations.*' => 'required|numeric',
            'date_start_mobility.*' => 'required|date|after:date_end_reg.*',
            'date_end_mobility.*' => 'required|date|after:date_start_mobility.*'
        ]);

        return $validator;
    }

    public function validateCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'mobility_ID' => 'required',
            'date_start_reg' => 'required|date',
            'date_end_reg' => 'required|date|after:date_start_reg',
            'count_students' => 'required|numeric',
            'count_registrations' => 'required|numeric',
            'date_start_mobility' => 'required|date|after:date_end_reg',
            'date_end_mobility' => 'required|date|after:date_start_mobility'
        ]);

        return $validator;
    }


    public function seasonEditShow($id)
    {
        $season = Season::find($id);
        $mobilities = Mobility::has('mobility_type')->has('category')->has('university')->has('country')->get();
        return view('system.edit.season_edit', ['season' => $season, 'mobilities' => $mobilities]);
    }

    public function seasonEdit(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }
        $season_ID = $request->input('ID');
        $mobility_id = $request->input('mobility_ID');
        $date_start_req = $request->input('date_start_reg');
        $date_end_req = $request->input('date_end_reg');
        $count_student = $request->input('count_students');
        $count_registrations = $request->input('count_registrations');
        $date_start_mobility = $request->input('date_start_mobility');
        $date_end_mobility = $request->input('date_end_mobility');
        $season = Season::find($season_ID);
        $season->mobility_ID = $mobility_id;
        $season->date_start_reg = date("Y-m-d", strtotime($date_start_req));
        $season->date_end_reg = date("Y-m-d", strtotime($date_end_req));
        $season->count_students = $count_student;
        $season->count_registrations = $count_registrations;
        $season->date_start_mobility = date("Y-m-d", strtotime($date_start_mobility));
        $season->date_end_mobility = date("Y-m-d", strtotime($date_end_mobility));
        $season->save();

        return redirect('/admin/season');
    }

    /*public function deleteSeason($id)
    {
        $season = Season::find($id);
        if ($season->date_end_reg >= Carbon::today()) {
            $season->delete();
            return redirect('/admin/season');
        }
        Session::flash('error', Lang::get('system.registrasion_expired_delete'));
        return redirect()->back()->withInput();
    }*/

    public function filterUsers(Request $request)
    {
        $term = $request->input('term');
        $page = $request->input('page');
        $data = User::select('ID', 'first_name', 'last_name', 'email')
            ->orWhere("email", "LIKE", "%" . $term . "%")
            ->orWhere("first_name", "LIKE", "%" . $term . "%")
            ->orWhere("last_name", "LIKE", "%" . $term . "%")
            ->skip($page * 10)
            ->take(10)
            ->get();
        $count = User::orWhere("email", "LIKE", "%" . $term . "%")
            ->orWhere("first_name", "LIKE", "%" . $term . "%")
            ->orWhere("last_name", "LIKE", "%" . $term . "%")
            ->count();


        return json_encode(['count' => $count, 'data' => $data]);

    }

    public function showDetail($id)
    {
        $users = User_season::select('*')->orderBy('ID', 'ASC')
            ->with([
                'season' => function ($query) {
                    $query->select('*');
                },
                'user' => function ($query) {
                    $query->select('*');
                },
                'status_season' => function ($query) {
                    $query->select('*')->orderBy('ID', 'DESC');
                },
                'status_season.user' => function ($query) {
                    $query->select('*')->orderBy('ID', 'DESC');
                }
            ])
            ->where('season_ID', '=', $id)
            ->paginate(15);


        $statuses = Season_status::get();

        return view('system.detail.detail_season_admin', ['users' => $users, 'statuses' => $statuses, 'season_ID' => $id]);

    }


    public function signInSeason(Request $request)
    {
        if (Auth::check()) {
            $userID = $request->input('user_id');
            $seasonID = $request->input('season_id');
            $offset = Variables::TIME_OFFSET;

            $count_pending = 0;
            $count_accept = 0;

            $actualSeason = Season::find($seasonID);
            $mobilityID = $actualSeason->mobility_ID;


            $signIn = Mobility::select('ID', 'partner_university_ID', 'category_ID', 'mobility_types_ID')
                ->with([
                    'season' => function ($query) use ($offset) {
                        $query->select('ID', 'date_start_reg', 'date_end_reg', 'count_students', 'count_registrations', 'mobility_ID', 'date_start_mobility', 'date_end_mobility')->where('date_end_reg', '>', Carbon::now($offset))->first();
                    },
                    'season.user_season' => function ($query) {
                        $query->select('ID', 'users_ID', 'season_ID');
                    },
                    'season.user_season.status_season' => function ($query) {
                        $query->select('ID', 'season_status_ID', 'users_season_ID')->orderBy('ID', 'DESC');
                    },
                    'university' => function ($query) {
                        $query->select('ID', 'img_url', 'name');
                    },
                    'category' => function ($query) {
                        $query->select('ID', 'name');
                    },
                    'mobility_type' => function ($query) {
                        $query->select('ID', 'name');
                    },
                ])
                ->where('mobility.ID', '=', $mobilityID)
                ->whereHas('season', function ($query) use ($offset, $seasonID) {
                    $query->where('season.date_end_reg', '>', Carbon::now($offset))->where('season.ID', '=', $seasonID);
                })
                ->get();


            $university = $signIn->first()->university;

            $firstSeason = $signIn->first()->season->first();
            try {
                foreach ($firstSeason->user_season as $item) {
                    if ($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_ACCEPT) {
                        $count_accept++;
                    }
                }
            } catch (\Exception $e) {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error')));
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
                        'reason' => Lang::get('app.detail_sign_up_mobility_error_date_admin')));
                }
            }

            $seasonID = $signIn->first()->season->first()->ID;

            \DB::beginTransaction();
            try {
                $user = User::find($userID);
                $user_season = new User_season();
                $user_season->users_ID = $user->ID;
                $user_season->season_ID = $seasonID;
                $user_season->save();
                $user_season_ID = DB::getPdo()->lastInsertId();


                $season_status = Season_Status::find(Variables::SEASON_STATUS_PENDING_ID);
                $system = Auth::user()->ID;
                $status_season = new Status_season();
                $status_season->season_status_ID = Variables::SEASON_STATUS_PENDING_ID;
                $status_season->users_ID = $system;
                $status_season->users_season_ID = $user_season_ID;

                $status_season->save();
                \DB::commit();
                $seasonObject = new \stdClass();
                $seasonObject->mobility = $signIn->first()->university->name . ' (' . $signIn->first()->category->name . ' / ' . $signIn->first()->mobility_type->name . ')';
                $seasonObject->status = Variables::SEASON_STATUS_PENDING_ID;
                $seasonObject->status_name = $season_status->name;
                Mail::to($user->email)->send(new StatusChangedEmail($seasonObject));
                return json_encode(array('status' => 'success',
                    'reason' => Lang::get('app.detail_sign_up_mobility_success_admin')));
            } catch (\Exception $e) {
                \DB::rollback();
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.detail_sign_up_mobility_error')));
            }
        }
    }

    public function changeStatus(Request $request)
    {
        /*$validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }*/
        $season_status_ID = $request->input('season_status_ID');
        $user_season_ID = $request->input('user_season_ID');
        $users_id = Auth::user()->ID;
        $season_ID = $request->input('season_ID');

        $status_season = new Status_season();
        $status_season->season_status_ID = $season_status_ID;
        $status_season->users_season_ID = $user_season_ID;
        $status_season->users_ID = $users_id;
        $status_season->save();

        $season = Season::with('mobility')->with('mobility.university')->with('mobility.category')->with('mobility.mobility_type')->where('season.ID', '=', $season_ID)->get()->first();
        $seasonObject = new \stdClass();
        $seasonObject->mobility = $season->mobility->university->name . ' (' . $season->mobility->category->name . ' / ' . $season->mobility->mobility_type->name . ')';
        $seasonObject->status = $season_status_ID;
        $seasonObject->status_name = Season_status::select('name')->find($season_status_ID)->name;

        $user = User_season::with('user')->find($user_season_ID);
        Mail::to($user->user->email)->send(new StatusChangedEmail($seasonObject));


        return redirect('/admin/season/detail/' . $season_ID);
    }

    public function validateSeasonCange($request)
    {
        $validator = Validator::make($request->all(), [
            'season_status_ID' => 'required',
            'users_season_ID' => 'required'
        ]);

        return $validator;
    }

    public function deleteUser_season($id)
    {
        $user_season = User_season::with('user')->find($id);
        $season_ID = $user_season->season_ID;
        $season = Season::with('mobility')->with('mobility.university')->with('mobility.category')->with('mobility.mobility_type')->where('season.ID', '=', $season_ID)->get()->first();
        $seasonObject = new \stdClass();
        $seasonObject->mobility = $season->mobility->university->name . ' (' . $season->mobility->category->name . ' / ' . $season->mobility->mobility_type->name . ')';
        $seasonObject->status = -1;
        $seasonObject->status_name = 'Odstránená';
        Status_season::where('users_season_ID', '=', $id)->delete();
        Mail::to($user_season->user->email)->send(new StatusChangedEmail($seasonObject));
        $user_season->delete();
        return back();
    }

    public function deleteSeason($id)
    {
        $season = Season::with('mobility')->with('mobility.university')->with('mobility.category')->with('mobility.mobility_type')->where('season.ID', '=', $id)->get()->first();

        $user_season = User_season::with('user')->where('season_ID', '=', $id)->get();
        $seasonObject = new \stdClass();
        $seasonObject->mobility = $season->mobility->university->name . ' (' . $season->mobility->category->name . ' / ' . $season->mobility->mobility_type->name . ')';
        $seasonObject->status = -1;
        $seasonObject->status_name = 'Odstránená';
        foreach ($user_season as $item) {

            Mail::to($item->user->email)->send(new StatusChangedEmail($seasonObject));
            User_season::find($item->ID)->delete();
            Status_season::where('users_season_ID', '=', $item->ID)->delete();
        }

        Season::find($id)->delete();
        return back();
    }

    public function restoreSeason($id)
    {
        Season::withTrashed()->find($id)->restore();
        return back();
    }

    public function exportActiveSeasons()
    {
        return Excel::download(new SeasonExport(), 'Akttívne sezóny - ' . date("d.m.Y",strtotime(now())) . '.xlsx');
    }

    public function exportUserSeason($id)
    {
        return Excel::download(new User_SeasonExport($id), 'Deatil sezóny.xlsx');
    }

}