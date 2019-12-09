<?php

namespace App\Http\Controllers\system;


use App\Http\Variables;
use App\Models\Category;
use App\Models\Mobility;
use App\Models\Mobility_Type;
use App\Models\Season_status;
use App\Models\University;
use App\Models\User;
use App\Models\User_season;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Season;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function loadMore($page)
    {
        $seasons = Season::with('mobility')->with('university')->with('country')->limit(151)->offset($page * 15)->get();

        return $seasons->toJson();
    }

    public function sortSeasons(Request $request)
    {
        DB::enableQueryLog();
        $universitySearch = $request->input('university');
        $from = ($request->input('from') == '') ? '' : date("Y-m-d", strtotime($request->input('from')));
        $to = ($request->input('to') == '') ? '' : date("Y-m-d", strtotime($request->input('to')));
        $sortBy = $request->input('sortBy');
        $sortType = $request->input('sortType');
        $active = $request->input('active');
        $type = $request->input('type');
        $category = $request->input('category');
        $page = $request->input('page');
        $sort = null;
        if ($sortBy && $sortType) $sort = true;

        $seasons = Season::with(['mobility' => function ($season) use (&$request) {

        }, 'university' => function ($season) use (&$request) {

        }, 'country' => function ($season) use (&$request) {

        }, 'mobility.mobility_type' => function ($season) use (&$request) {

        }, 'mobility.category' => function ($season) use (&$request) {

        }])->join('mobility', 'mobility_ID', '=', 'mobility.ID')
            ->join('partner_university', 'partner_university_ID', '=', 'partner_university.ID')
            ->when($universitySearch, function ($query) use ($universitySearch) {
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

        $seasons = $seasons->toArray();

        foreach ($seasons as $season) {
            if ($season['mobility'] != null && $season['university'] != null) {
                $season['date_start_reg'] = date("d.m.Y", strtotime($season['date_start_reg']));
                $season['date_end_reg'] = date("d.m.Y", strtotime($season['date_end_reg']));
                $season['date_start_mobility'] = date("d.m.Y", strtotime($season['date_start_mobility']));
                $season['date_end_mobility'] = date("d.m.Y", strtotime($season['date_end_mobility']));
                $result[] = $season;
            }


        }
        return json_encode($seasons);
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
        return view('system.edit.season_edit', ['season' => $season]);
    }

    public function deleteSeason($id)
    {
        $season = Season::find($id);
        if ($season->date_end_reg >= Carbon::today()) {
            $season->delete();
            return redirect('/admin/season');
        }
        Session::flash('error', Lang::get('system.registrasion_expired_delete'));
        return redirect()->back()->withInput();
    }

    public function filterUsers(Request $request){
        $userEmail = $request->input('query','');
        $posts = User::where('email','LIKE','%'.$userEmail.'%')->get();

        return response()->json($posts);

    }

    public function showDetail($id)
    {
        DB::enableQueryLog();
        //$users = User_season::has('user')->has('status_season.season_status')->where('season_ID', '=', $id)->paginate(15);
        /*echo '<pre>';
        var_dump($users);
        echo '</pre>';
        die;*/

        $users = User_Season::select('ID', 'users_ID', 'season_ID')
            ->with([
                'season' => function ($query) {
                    $query->select('ID', 'date_start_mobility', 'date_end_mobility', 'mobility_ID');
                },
                'season.mobility' => function ($query) {
                    $query->select('ID', 'info', 'partner_university_ID');
                },
                'season.mobility.university' => function ($query) {
                    $query->select('ID', 'country_ID', 'name');
                },
                'season.mobility.university.country' => function ($query) {
                    $query->select('ID', 'name');
                },
                'status_season' => function ($query) {
                    $query->select('ID', 'users_season_ID', 'season_status_ID', 'users_id', 'created_at')->orderBy('ID', 'DESC')->first();
                },
                'status_season.user' => function ($query) {
                    $query->select('ID', 'email')->orderBy('ID', 'DESC')->first();
                }
            ])
            ->where('season_ID', '=', $id)
            ->paginate(15);
        $statuses = Season_status::get();

        foreach ($users as $item) {
            $i = $item->season->mobility->university;
            $item->place_name = $i->name . ', ' . $i->country->name;
        }

        return view('system.detail_season_admin', ['users' => $users, 'statuses' => $statuses]);

    }

}