<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    protected $fillable=[
        'post_id',
        'user_id',
        'single_post'
    ];

    public function posts(){
        return $this->belongsTo('App\Post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post_images(){
        return $this->hasMany('App\Image_post');
    }


}
