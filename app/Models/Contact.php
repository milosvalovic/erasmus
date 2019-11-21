<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contact';
    protected $fillable = ['firstname', 'lastname', 'title_before_name', 'title_after_name', 'workplace', 'telephone_work', 'phone', 'room', 'email'];
}