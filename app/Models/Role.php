<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $primaryKey = "ID";
    protected $table = 'roles';
    protected $fillable = ['description', 'name'];

    public function users()
    {
        return $this->hasMany(User::class,'roles_id','id');
    }
}