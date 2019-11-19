<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog';
    protected $fillable = ['users_ID', 'text', 'title', 'mobility_ID', 'status', 'confirm_by'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season', 'users_season_ID','ID');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','users_ID','ID');
    }

    public function user_2()
    {
        return $this->belongsTo('App\Models\User','confirm_by','ID');
    }
}