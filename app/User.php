<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'school',
        'photo_id',
        'major',
        'goal',
        'interest',
        'notifyEmail',
        'notifyAdditionals'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function files(){
        return $this->hasMany('App\Image_post');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function additionals(){
        return $this->hasMany('App\Additional');
    }

    public function singles(){
        return $this->hasMany('App\Single');
    }
}
