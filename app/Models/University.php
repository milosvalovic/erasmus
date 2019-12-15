<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $primaryKey = "ID";
    protected $table = 'partner_university';
    protected $fillable = ['country_ID', 'city', 'address', 'name', 'acronym', 'info', 'img_url', 'thumb_url'];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_ID', 'ID');
    }

    public function mobility()
    {
        return $this->hasMany('App\Models\Mobility', 'partner_university_ID', 'ID');
    }

    public function user_season(){
        return $this->HasManyDeep('App\Models\User_Season',['App\Models\Mobility','App\Models\Season'],['partner_university_ID','mobility_ID','season_ID'],['ID','ID','ID']);
    }
}
