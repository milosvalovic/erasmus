<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $primaryKey = 'ID';
    protected $table = 'countries';
    protected $fillable= ['name','country_code','erasmus_code'];


    public function university(){
        return $this->hasMany('App\Models\University','country_ID','ID');
    }

    public function user_season(){
        return $this->HasManyDeep('App\Models\User_Season',['App\Models\University','App\Models\Mobility','App\Models\Season'],['country_ID','partner_university_ID','mobility_ID','season_ID'],['ID','ID','ID','ID']);
    }
}