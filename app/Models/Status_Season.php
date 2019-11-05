<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_season extends Model
{
    protected $table = 'status_season';
    protected $fillable= ['season_status_ID','users_season_ID','user_ID'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season', 'users_season_ID');
    }

    public function season_status()
    {
        return $this->belongsTo('App\Models\Season_Status','season_status_ID');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }
}
