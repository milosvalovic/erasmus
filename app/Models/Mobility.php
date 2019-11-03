<?php
/**
 * Created by PhpStorm.
 * User: ecneb
 * Date: 2019-10-19
 * Time: 16:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobility extends Model
{
    protected $table = 'mobility';
    protected $fillable = ['mobility_types_ID', 'partner_university_ID', 'grant', 'info'];
}