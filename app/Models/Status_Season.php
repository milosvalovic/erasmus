<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status_season extends Model
{
    use SoftDeletes;

    protected $table = 'status_season';
    protected $fillable= ['season_status_ID','users_season_ID','user_ID'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season', 'users_season_ID','ID');
    }

    public function season_status()
    {
        return $this->belongsTo('App\Models\Season_Status','season_status_ID','ID');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id','ID');
    }
}
