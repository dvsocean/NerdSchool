<?php

namespace App\Http\Controllers;

use App\Image_post;
use App\Notifications\PostAdded;
use App\Post;
use App\Single;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThreadController extends Controller
{


    public function store(Request $request)
    {
        //store
        auth()->user()->posts()->create($request->all());
        Session::flash('post_message', 'A new topic has been started by');
        return redirect('/discussions');
    }




    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $new_post = $request->all();
        $new_post['post_id'] = $post->id;
        $new_singles_record= Single::create($new_post);
        $post->update($request->all());

        if($request->hasFile('image')){
            $file=$request->file('image');
            $name= time() . $file->getClientOriginalName();
            $size= $file->getSize();
            if($size < 4000000){
                $file->move('post_images/', $name);
                Image_post::create(['post_image'=> $name, 'file_size'=> $size, 'single_id'=> $new_singles_record->id]);
            }
        }
        $post->user->notify(new PostAdded($post));
        Session::flash('post_message', 'You have added a comment to '. $post->topic);
        return redirect('/discussions');
    }

    public function api_endpoint_create(Request $request) {
//        User::create(['name'=> $request->input('name'), 'email'=> $request->input('email'), 'password'=> $request->input('password')]);
//        return "Data stored successfully with ".$request->input('name') .", ".$request->input('email').", password has been hashed" ;
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $collect = [
            'User'=>[
                'username'=> $name,
                'email'=> $email,
                'password'=> $password
            ],
            'Receiver'=>'Ocean',
            'Access'=>'Admin'
        ];
        return response()->json($collect, 200);
    }
}
