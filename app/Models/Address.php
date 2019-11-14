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

class Address extends Model
{
    use SoftDeletes;

    protected $table = 'address';
    protected $fillable = ['street', 'address'];
}