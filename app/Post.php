<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Post extends Model
{
    protected $fillable=[
    	'user_id',
    	'title',
    	'topic',
        'discussion_date',
    	'post',
    	'pic_id',
        'posted_by'
    ];


    //RELATIONSHIPS
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function profile_pic(){
        return $this->belongsTo('App\Photo');
    }

    public function images(){
        return $this->hasOne('App\Image_post');
    }

    public function singles(){
        return $this->hasMany('App\Single');
    }


    //USED IN THE POST CONTROLLER
    public static function upload_file($file_array, $post){
        $file=$file_array;
        $name= time() . $file->getClientOriginalName();
        $size= $file->getSize();
        $type= $file->getClientOriginalExtension();

        if($type == 'jpg' || $type == 'png' || $type == 'JPG' || $type == 'gif' || $type == 'jpeg' || $type == 'PNG') {
            if ($size < 4000000) {
                $file->move('post_images/', $name);
                Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'post_id'=> $post->id]);
            }
        } elseif ($type == 'html' || $type == 'txt' || $type == 'sql' || $type == 'docx' || $type == 'css') {
            $file->move('post_files/', $name);
            Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'post_id'=> $post->id]);
        } else {
            Session::flash('error_message', $type . ' is not a supported file extension, FILE upload failed!');
        }
    }

    //USED IN THE EACH CONTROLLER
    public static function upload_file_for_each($file_array, $new_singles_record){
        $file=$file_array;
        $name= time() . $file->getClientOriginalName();
        $size= $file->getSize();
        $type= $file->getClientOriginalExtension();

        if($type == 'jpg' || $type == 'png' || $type == 'JPG' || $type == 'gif' || $type == 'jpeg' || $type == 'PNG') {
            if ($size < 4000000) {
                $file->move('post_images/', $name);
                Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
            }
        } elseif ($type == 'html' || $type == 'txt' || $type == 'sql' || $type == 'docx'|| $type == 'css') {
            $file->move('post_files/', $name);
            Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
        } else {
            Session::flash('error_message', $type . ' is not a supported file extension, FILE upload failed!');
        }
    }

    //SEND THE ADMINS AN EMAIL NOTIFICATION OF ALL ACTIVITY
    public static function notify_admin_all_activity($post, $new_singles_record){
        $admin= "ORIGINAL AUTHOR: ". $post->posted_by."\n\n";
        $admin.="RECENT ACTIVITY BY: ". $new_singles_record->user->name."\n\n";
        $admin.= "TOPIC: ". $new_singles_record->topic."\n\n";
        $admin.= "BODY: ". $new_singles_record->single_post;
        mail('dvsocean@icloud.com', 'NERD ACTIVITY', $admin);
    }

    //SEND OWNER OF THE POST A NOTIFICATION ONLY IF HE WANTS IT
    //FUNCTION NOT WORKING FOR SOME REASON, IMPLEMENTATION ON HOLD
    public static function notify_user($post, $new_singles_record){
        if($post->user->notifyEmail == 'yes'){
            $message= ucfirst(Auth::user()->name) . " responded to your ". $new_singles_record->topic . " thread \n\n";
            $message.="Response: " . $new_singles_record->single_post. " \n\n";
            $message.=ucfirst(Auth::user()->name)."'s email address is ". Auth::user()->email;
            mail($post->user->email, $post->topic, $message);
        }
    }
}
