<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function user(){
        return $this->belongsTo('App\User');
    }

    //STORE EACH THREAD MEMBERS USER INFO
    public static function store_thread_members($check_records, $post){
        if(!$check_records){
            $input = [
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email
            ];
            Additional::create($input);
        }
    }

    //EMAIL EACH MEMBER OF THREAD ACTIVITY
    public static function notify_each_member($additionals, $new_singles_record){
        foreach ($additionals as $additional){
            if($additional->user->notifyAdditionals == 'yes'){
                $mail_addition= ucfirst($new_singles_record->user->name)." wrote: ".$new_singles_record->single_post;
                mail($additional->email, "Activity by " . ucfirst($new_singles_record->user->name), $mail_addition);
            }
        }
    }

}
