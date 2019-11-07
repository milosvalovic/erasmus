<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['users_ID', 'mobility_ID', 'text', 'rating'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season','users_season_ID','ID');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image','comments_ID','ID');
    }
}