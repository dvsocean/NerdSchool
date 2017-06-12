<?php

namespace App\Http\Controllers;

use App\Image_post;
use App\Notifications\PostAdded;
use App\Single;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return"HITTING INDEX";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function start_thread(Request $request, Post $post){

    }


    public function store(Request $request)
    {
        $input= $request->all();
        $post= Post::create($input);
        //EMAIL IS BEING PREPARED AS SOON AS POST GETS CREATED
        $message= "Owner of thread: " . ucfirst($request->input('posted_by')) . " \n";
        $message.="Topic: " . $request->input('topic') . "\n\n";
        $message.="Body: " . $request->input('post') . "\n\n";
        $message.="Email on file for " . ucfirst($request->input('posted_by')) . " is " . $request->input('email');
        //NOTIFICATION EMAIL SENT OUT TO ADMIN
        mail('dvsocean@icloud.com', 'New thread has been started', $message);

        //IMAGE UPLOAD
        if($request->hasFile('attachment')){
            $file=$request->file('attachment');
            $name= time() . $file->getClientOriginalName();
            $size= $file->getSize();
            $type= $file->getClientOriginalExtension();

            if($type == 'jpg' || $type == 'png' || $type == 'JPG' || $type == 'gif' || $type == 'jpeg' || $type == 'PNG') {
                if ($size < 4000000) {
                    $file->move('post_images/', $name);
                    Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'post_id'=> $post->id]);
                }
            } elseif ($type == 'html' || $type == 'txt' || $type == 'sql' || $type == 'docx') {
                $file->move('post_files/', $name);
                Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'post_id'=> $post->id]);
            } else {
                Session::flash('error_message', $type . ' is not a supported file extension, FILE upload failed!');
            }
        }
        //IMAGE UPLOAD

        Session::flash('post_message', 'You have started a new "'. $request->input('topic').'" discussion.');
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
        $post= Post::findOrFail($id);
        $singles= Single::where('post_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);

        return view('discussions.each', compact('post', 'singles'));
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
        //HAS BEEN MOVED TO EachController@store

//        $post = Post::findOrFail($id);
//        $new_post = $request->all();
//        $new_post['post_id'] = $post->id;
//        $new_post['topic']= $request->input('topic');
//
//        $new_singles_record= Single::create($new_post);
//
//        if($request->hasFile('image')){
//            $file=$request->file('image');
//            $name= time() . $file->getClientOriginalName();
//            $size= $file->getSize();
//            $type= $file->getClientOriginalExtension();
//
//            if($type == 'jpg' || $type == 'png' || $type == 'JPG' || $type == 'gif' || $type == 'jpeg' || $type == 'PNG') {
//                if ($size < 4000000) {
//                    $file->move('post_images/', $name);
//                    Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
//                }
//            } elseif ($type == 'html' || $type == 'php' || $type == 'txt' || $type == 'sql') {
//                $file->move('post_files/', $name);
//                Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
//            } else {
//                Session::flash('error_message', $type . ' is not a supported file extension, FILE upload failed!');
//            }
//        }
//
//        if($post->user != Auth::user()){
//            $post->user->notify(new PostAdded($post));
//        }
//
//        if(Auth::user()->name != $post->user->name){
//            if($post->user->notifyEmail == 'yes'){
//                $message= ucfirst(Auth::user()->name) . " responded to the ".$new_singles_record->topic . " thread \n\n";
//                $message.="Response: " . $new_singles_record->single_post. " \n\n";
//                $message.=ucfirst(Auth::user()->name)."'s email address is ". Auth::user()->email;
//                mail($post->user->email, $post->topic, $message);
//            }
//        }
//
//        if(Auth::user()->name != $post->user->name){
//            Session::flash("post_message", "You have added a comment to ". ucfirst($post->user->name) ."'s ".$post->topic . " thread");
//        } else {
//            Session::flash('post_message', 'You have added a comment to your own thread "'. $post->topic . '".');
//        }
//
//        return redirect('/discussions');
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
