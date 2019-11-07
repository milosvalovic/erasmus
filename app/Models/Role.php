<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['description', 'name'];

    public function user()
    {
        return $this->hasMany('App\Models\User','roles_ID','ID');
    }
}