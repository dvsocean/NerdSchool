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

        try{
            if(!$new_post= $request->all()){
                throw new Exception("Malicious entry, please re-type");
            }
        } catch (Exception $a){
            $msg= $a->getMessage();
            Session::flash('error_message', $msg);
            return redirect('/discussions');
        }

        $raw= $request->input('single_post');

        $new_post_raw= mb_ereg_replace('/[\*]+/', '', $raw);
        $new_post['post_id'] = $post->id;
        $new_post['topic']= $request->input('topic');
        $new_post['single_post']= $new_post_raw;

        $new_singles_record= Single::create($new_post);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $name= time() . $file->getClientOriginalName();
            $size= $file->getSize();
            $type= $file->getClientOriginalExtension();

            if($type == 'jpg' || $type == 'png' || $type == 'JPG' || $type == 'gif' || $type == 'jpeg' || $type == 'PNG') {
                if ($size < 4000000) {
                    $file->move('post_images/', $name);
                    Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
                }
            } elseif ($type == 'html' || $type == 'php' || $type == 'txt' || $type == 'sql') {
                $file->move('post_files/', $name);
                Image_post::create(['post_image' => $name, 'type' => $type, 'file_size' => $size, 'single_id' => $new_singles_record->id]);
            } else {
                Session::flash('error_message', $type . ' is not a supported file extension, FILE upload failed!');
            }
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
            Session::flash('post_message', 'You have added a comment to your own thread "'. $post->topic . '".');
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
