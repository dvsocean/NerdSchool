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
        $user= User::findOrFail($request->input('user_id'));
        $input= $request->all();
        Post::create($input);
        $message= "Posted By: ".$request->input('posted_by')." This is still a test message ";

        mail('dvsocean@icloud.com', 'New Account Created', $message);

        Session::flash('post_message', 'A new topic has been started by '. ucfirst($user->name));
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
        $singles= Single::where('post_id', '=', $id)->orderBy('created_at', 'desc')->paginate(15);

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
        $post = Post::findOrFail($id);
        $new_post = $request->all();
        $new_post['post_id'] = $post->id;
        $new_post['topic']= $request->input('topic');

        $new_singles_record= Single::create($new_post);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $name= time() . $file->getClientOriginalName();
            $size= $file->getSize();
            if($size < 4000000){
                $file->move('post_images/', $name);
                Image_post::create(['post_image'=> $name, 'file_size'=> $size, 'single_id'=> $new_singles_record->id]);
            }
        }
        if($post->user != Auth::user()){
            $post->user->notify(new PostAdded($post));
        }
        Session::flash('post_message', 'You have added a comment to '. ucfirst($post->user->name) .'s '.$post->topic . ' thread');
        return redirect('/discussions');
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
