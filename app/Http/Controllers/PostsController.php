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
            Post::upload_file($request->file('attachment'), $post, $request->input('user_id'));
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
