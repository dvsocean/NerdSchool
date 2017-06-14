<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    protected $fillable= [
        'post_id',
        'user_id',
        'name',
        'email'
    ];


    public function post(){
        return $this->belongsTo('App\Post');
    }

}
