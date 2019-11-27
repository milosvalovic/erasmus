<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $primaryKey = 'ID';
    protected $table = 'category';
    protected $fillable= ['name'];

    use SoftDeletes;

    public function mobility(){
        return $this->hasMany('App\Models\Mobility','country_ID','ID');
    }
}
