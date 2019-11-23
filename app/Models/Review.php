<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'reviews';
    protected $fillable = ['users_ID', 'mobility_ID', 'text', 'rating'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season', 'users_season_ID', 'ID');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'reviews_ID', 'ID');
    }

    public function user()
    {
        return $this->beThrough('App\Models\User','App\Models\User_Season','users_ID','ID','ID','ID');
    }

    public function mobility(){
        return $this->HasManyDeep('App\Models\Mobility',['App\Models\User_Season','App\Models\Season'],['ID','ID','ID'],['users_season_ID','season_ID','mobility_ID']);
    }
    
}