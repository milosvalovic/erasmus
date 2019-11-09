<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-11-09
 * Time: 10:02
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use SoftDeletes;

    protected $table = 'faq';
    protected $fillable = ['name', 'description'];
}