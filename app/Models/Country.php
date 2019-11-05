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
    protected $table = 'countries';
    protected $fillable= ['country_name','country_code'];


    public function university(){
        return $this->hasMany('App\Models\University');
    }
}