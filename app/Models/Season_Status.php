<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season_status extends Model
{
    protected $table = 'season_status';
    protected $fillable= ['name'];

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season','season_status_ID','ID');
    }

}
