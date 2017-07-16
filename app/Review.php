<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=[
        'user_id',
        'name',
        'email',
        'file',
        'size'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
