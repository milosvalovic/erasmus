<?php

namespace App\Http\Controllers\system;


use App\Models\Category;
use App\Models\Mobility_Type;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class SeasonController extends Controller
{
    public function season()
    {
        $universities = University::has('country')->get();
        $categories = Category::all();
        $mobility_type = Mobility_Type::All();
        return view('system.season_admin', ['universities' => $universities, 'categories' => $categories, 'types'=>$mobility_type]);
    }

    public function newSeasonShow()
    {
        return view('system.add.season_add');
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
        $page =$request->input('page');
        $sort = null;
        if ($sortBy && $sortType) $sort = true;

        $seasons = Season::with(['mobility' => function ($season) use (&$request) {

        }, 'university' => function ($season) use (&$request) {

        }, 'country' => function ($season) use (&$request) {

        }, 'mobility.mobility_type' => function ($season) use (&$request) {

        }, 'mobility.category' => function ($season) use (&$request) {

        }])->join('mobility','mobility_ID', '=', 'mobility.ID')
            ->join('partner_university','partner_university_ID', '=', 'partner_university.ID')
            ->when($universitySearch, function ($query) use ($universitySearch) {
                return $query->whereHas('university', function ($query) use ($universitySearch) {
                    $query->where('partner_university.ID', '=', $universitySearch);
                });
            })
            ->when($type, function ($query) use ($type) {
                return $query->whereHas('mobility.mobility_type', function ($query) use ($type) {
                    $query->where('mobility_types.ID','=', $type);
                });
            })->when($category, function ($query) use ($category) {
                return $query->whereHas('mobility.category', function ($query) use ($category) {
                    $query->where('category.ID','=', $category);
                });
            })
            ->when($sort, function ($query) use ($sortBy, $sortType) {
                if($sortBy=='university'){
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
            })->skip($page*15)->take(15)->get();

        $seasons = $seasons->toArray();

        foreach ($seasons as $season) {
            if ($season['mobility'] != null && $season['university'] != null) {
                $season['date_start_reg'] = date("d.m.Y", strtotime($season['date_start_reg']));
                $season['date_end_reg'] = date("d.m.Y", strtotime($season['date_end_reg']));
                $season['date_start_mobility'] = date("d.m.Y", strtotime($season['date_start_mobility']));
                $season['date_end_mobility'] = date("d.m.Y", strtotime($season['date_end_mobility'] ));
                $result[] = $season;
            }


        }
        return json_encode($seasons);
    }

    public function multiAddSeasonsShow(Request $request){
        $seasons_ids = $request->input('season_ids');
        $seasons = Season::has('mobility')->has('university')->has('country')->has('mobility.mobility_type')->has('mobility.category')->find($seasons_ids);

        return view('system.extend_season_admin',['seasons' => $seasons]);
    }

    public function multiAddSeason(Request $request){
        $mobility_ids = $request->input('mobility_ids');

    }

    public function validateCreate($elements){
        $validator = Validator::make($elements, [
            'date_start_reg' => 'required',
            'date_end_reg' => 'required',
            'count_student' => 'required',
            'count_registrations' => 'required',
            'mobility_ID' => 'required',
            'date_start_mobility' => 'required',
            'date_end_mobility' => 'required',
        ]);

        return $validator;
    }



    public function seasonEditShow($id)
    {
        $season = Season::find($id);
        return view('system.edit.season_edit', ['season' => $season]);
    }

}