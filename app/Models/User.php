<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'first_name', 'last_name', 'newsletter', 'hash'];

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season');
    }

    public function user_season()
    {
        return $this->hasMany('App\Models\User_Season');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role','roles_ID');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function blog_2()
    {
        return $this->hasMany('App\Models\Blog');
    }
}