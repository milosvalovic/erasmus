<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable= ['url','comments_ID'];

    public function comments()
    {
        return $this->belongsTo('App\Models\Comment','comments_ID','ID');
    }

}
