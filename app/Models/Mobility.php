<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mobility extends Model
{
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'mobility';
    protected $fillable = ['mobility_types_ID', 'partner_university_ID', 'grant', 'info'];

    public function university()
    {
        return $this->belongsTo('App\Models\University', 'partner_university_ID','ID');
    }

    public function mobility_type()
    {
        return $this->belongsTo('App\Models\Mobility_Type', 'mobility_types_ID','ID');
    }

    public function season()
    {
        return $this->hasMany('App\Models\Season','mobility_ID','ID');
    }

    public function review()
    {
        return $this->HasManyDeep('App\Models\Review',['App\Models\Season','App\Models\User_Season'],['mobility_ID','season_ID','users_season_ID'],['ID','ID','ID']);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_ID','ID');
    }

    public function presentation()
    {
        return $this->HasManyDeep('App\Models\Presentation',['App\Models\Season','App\Models\User_Season'],['mobility_ID','season_ID','users_season_ID'],['ID','ID','ID']);
    }

    public function user_season()
    {
        return $this->hasManyThrough('App\Models\User_Season','App\Models\Season','mobility_ID','season_ID','ID','ID');
    }
}