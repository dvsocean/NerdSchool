<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable= ['file'];

    protected $uploads = 'nerd_images/';

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}
