<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'season';
    protected $primaryKey = 'ID';
    protected $fillable = ['date_start_reg', 'date_end_reg', 'count_students', 'count_registrations', 'mobility_ID', 'date_start_mobility', 'date_end_mobility'];

    public function mobility()
    {
        return $this->belongsTo('App\Models\Mobility', 'mobility_ID', 'ID');
    }

    public function user_season()
    {
        return $this->hasMany('App\Models\User_Season', 'season_ID', 'ID');
    }

    public function university(){
        return $this->hasOneDeep('App\Models\University',['App\Models\Mobility'], ['ID', 'ID'] ,['mobility_ID','partner_university_ID']);
    }

    public function country(){
        return $this->hasOneDeep('App\Models\Country',['App\Models\Mobility','App\Models\University'], ['ID','ID','ID'] ,['mobility_ID','partner_university_ID','country_ID']);
    }
}