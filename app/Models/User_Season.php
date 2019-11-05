<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_season extends Model
{
    protected $table = 'user_season';
    protected $fillable= ['user_ID','season_ID'];

    public function season()
    {
        return $this->belongsTo('App\Models\Season','season_ID');
    }

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','users_ID');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
