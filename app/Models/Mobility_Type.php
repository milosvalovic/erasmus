<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobility_Type extends Model
{
    protected $primaryKey = 'ID';
    protected $table = 'mobility_types';
    protected $fillable= ['name'];

    public function mobility()
    {
        return $this->hasMany('App\Models\Mobility','mobility_types_ID','ID');
    }
}
