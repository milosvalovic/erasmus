<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-11-09
 * Time: 13:40
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office_Hours extends Model
{
    use SoftDeletes;

    protected $table = 'office_hours';
    protected $fillable = ['day', 'from', 'to', 'off'];
}