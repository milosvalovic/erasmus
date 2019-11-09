<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes;

    protected $table = 'season';
    protected $fillable = ['date_start_reg', 'date_end_reg', 'count_students', 'count_registrations', 'mobility_ID', 'date_start_mobility', 'date_end_mobility'];

    public function mobility()
    {
        return $this->belongsTo('App\Models\Mobility','mobility_ID','ID');
    }

    public function user_season()
    {
        return $this->hasMany('App\Models\User_Season','season_ID','ID');
    }
}