<?php
/**
 * Created by PhpStorm.
 * User: Miloš
 * Date: 19. 11. 2019
 * Time: 13:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Password_Resets extends Model
{
    protected $table = 'password_resets';
    protected $fillable = ['email','token'];
}