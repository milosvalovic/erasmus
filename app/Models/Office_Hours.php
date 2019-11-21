<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office_Hours extends Model
{
    use SoftDeletes;

    protected $table = 'office_hours';
    protected $fillable = ['day', 'from', 'to', 'off'];
}