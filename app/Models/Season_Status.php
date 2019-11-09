<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season_status extends Model
{
    use SoftDeletes;

    protected $table = 'season_status';
    protected $fillable= ['name'];

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season','season_status_ID','ID');
    }

}