<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobility_Type extends Model
{
    protected $table = 'mobility_types';
    protected $fillable= ['name'];

    public function mobility()
    {
        return $this->hasMany('App\Models\Mobility');
    }
}
