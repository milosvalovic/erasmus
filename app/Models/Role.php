<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';
    protected $fillable = ['description', 'name'];

    public function user()
    {
        return $this->hasMany('App\Models\User', 'roles_ID', 'ID');
    }
}