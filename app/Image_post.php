<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_post extends Model
{
    protected $fillable= [
        'post_image',
        'file_size',
        'single_id',
        'type'
    ];

    public function singles(){
        return $this->belongsTo('App\Single');
    }

    public function posts(){
        return $this->belongsTo('App\Post');
    }
}
