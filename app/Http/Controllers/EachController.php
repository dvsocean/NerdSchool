<?php

namespace App\Http\Controllers;

use App\Image_post;
use App\Notifications\PostAdded;
use App\Post;
use App\Single;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id)
    {
        //POST METHOD ONLY HITS STORE BECAUSE THAT'S WHERE PHP ARTISAN ROUTE:LIST POINTS
        $post = Post::findOrFail($id);
        $new_post= $request->all();
        $new_post['post_id'] = $post->id;
        $new_singles_record= Single::create($new_post);

        //NOTIFY ME OF ALL ACTIVITY ANYWAY
        $admin= "ORIGINAL AUTHOR: ". $post->posted_by."\n\n";
        $admin.="RECENT ACTIVITY BY: ". $new_singles_record->user->name."\n\n";
        $admin.= "TOPIC: ". $new_singles_record->topic."\n\n";
        $admin.= "BODY: ". $new_singles_record->single_post;
        mail('dvsocean@icloud.com', 'NERD ACTIVITY', $admin);
        //NOTIFY ME OF ALL ACTIVITY ANYWAY

        if($request->hasFile('image')){
           Post::upload_file_for_each($request->file('image'), $new_singles_record);
        }

        if($post->user != Auth::user()){
            $post->user->notify(new PostAdded($post));
        }

        if(Auth::user()->name != $post->user->name){
            if($post->user->notifyEmail == 'yes'){
                $message= ucfirst(Auth::user()->name) . " responded to your ". $new_singles_record->topic . " thread \n\n";
                $message.="Response: " . $new_singles_record->single_post. " \n\n";
                $message.=ucfirst(Auth::user()->name)."'s email address is ". Auth::user()->email;
                mail($post->user->email, $post->topic, $message);
            }
        }

        if(Auth::user()->name != $post->user->name){
            Session::flash("post_message", "You have added a comment to ". ucfirst($post->user->name) ."'s ".$post->topic . " thread");
        } else {
            Session::flash('post_message', 'You have added a comment to your own "'. $post->topic . '" thread.');
        }
        return redirect('/discussions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
