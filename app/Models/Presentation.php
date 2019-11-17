<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-11-09
 * Time: 13:40
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model
{
    use SoftDeletes;

    protected $table = 'presentations';
    protected $fillable = ['users_season_ID','file_url'];

    public function user_season()
    {
        return $this->belongsTo('App\Models\User_Season', 'users_season_ID','ID');
    }
}