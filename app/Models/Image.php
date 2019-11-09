<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';
    protected $fillable= ['url','comments_ID'];

    public function comments()
    {
        return $this->belongsTo('App\Models\Review','reviews_ID','ID');
    }

}
