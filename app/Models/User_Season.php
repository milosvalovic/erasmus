<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_season extends Model
{
    use SoftDeletes;

    protected $table = 'users_season';
    protected $fillable= ['user_ID','season_ID'];

    public function season()
    {
        return $this->belongsTo('App\Models\Season','season_ID','ID');
    }

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season', 'users_season_ID', 'ID');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','users_ID','ID');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Review','users_season_ID','ID');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog','users_season_ID','ID');
    }

    public function presentation()
    {
        return $this->hasMany('App\Models\Presentation', 'users_season_ID','ID');
    }
}
