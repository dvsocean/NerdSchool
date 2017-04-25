<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
    	'user_id',
    	'title',
    	'topic',
    	'post',
    	'pic_id'
    ];

    public function user(){
    	$this->belongsTo('App\User');
    }
}
