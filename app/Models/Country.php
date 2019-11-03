<?php
/**
 * Created by PhpStorm.
 * User: Dusan
 * Date: 31.10.2019
 * Time: 18:01
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Countries';
    protected $fillable= ['country_name','country_code'];
}