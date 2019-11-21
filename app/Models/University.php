<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;

    protected $table = 'partner_university';
    protected $fillable = ['country_ID', 'city', 'address', 'name', 'acronym', 'info', 'image_URL'];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_ID', 'ID');
    }

    public function mobility()
    {
        return $this->hasMany('App\Models\Mobility', 'partner_university_ID', 'ID');
    }
}
