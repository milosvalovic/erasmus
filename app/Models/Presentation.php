<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model
{
    use SoftDeletes;

    protected $table = 'presentations';
    protected $fillable = ['users_season_ID', 'file_url'];
}