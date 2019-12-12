<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use SoftDeletes;


    protected $primaryKey = 'ID';
    protected $table = 'faq';
    protected $fillable = ['name', 'description'];
}