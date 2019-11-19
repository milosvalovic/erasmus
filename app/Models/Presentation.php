<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-11-19
 * Time: 20:12
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model
{
    use SoftDeletes;

    protected $table = 'presentations';
    protected $fillable = ['users_season_ID', 'file_url'];
}