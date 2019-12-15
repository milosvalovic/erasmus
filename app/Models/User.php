<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $primaryKey = 'ID';
    protected $table = 'users';
    protected $fillable = ['name','email', 'password', 'first_name', 'last_name', 'newsletter', 'hash', 'verified','roles_ID'];
    protected $hidden = ['password', 'remember_token'];

    public function status_season()
    {
        return $this->hasMany('App\Models\Status_Season', 'users_id', 'ID');
    }

    public function user_season()
    {
        return $this->hasMany('App\Models\User_Season', 'users_ID', 'ID');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class,'roles_ID','ID');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog', 'users_ID', 'ID');
    }

    public function blog_2()
    {
        return $this->hasMany('App\Models\Blog', 'confirm_by', 'ID');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        /*echo $this->roles()->where('name', $role)->first();
        die;*/
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function verifyUser()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }



}