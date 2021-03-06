<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'ID';
    protected $table = 'images';
    protected $fillable= ['url', 'thumb_url', 'comments_ID'];

    public function comments()
    {
        return $this->belongsTo('App\Models\Review','reviews_ID','ID');
    }

}