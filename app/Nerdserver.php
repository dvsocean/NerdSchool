<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nerdserver extends Model
{
    protected $fillable=[
        'user_id',
        'file',
        'file_size',
        'type'
    ];
}
