<?php

namespace App\Http\Controllers;

use App\Nerdserver;
use App\Review;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\NerdRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nerds= User::all();

        return view('classmates.index', compact('nerds'));

    }

    public function verify_nerd(Request $request){
        $storage_folder= $request->input('agreement');
        $store_path= "nerd_folder/" . $storage_folder;
        $input['accepted_by']= $request->input('agreement');
        $input['nerd_directory']= $store_path;
        $user= User::find($request->input('user_id'));
        $user->update($input);
        File::makeDirectory($store_path, 0777, true);
        return redirect('/live');
    }


    //INCOMING FROM DROPZONE
    public function upload(Request $request){
        $file= $request->file('file');
        $name= $file->getClientOriginalName();
        $size= $file->getSize();
        $type= $file->getClientOriginalExtension();
        $file->move('nerd_folder/'. ucfirst(Auth::user()->name), $name);

            $msg= ucfirst(Auth::user()->name)." has files that need to be reviewed.\n\n";
            $msg.="On file email is ". Auth::user()->email;
            mail('dvsocean@icloud.com', 'FILES FOR REVIEW', $msg);

        Nerdserver::create(['user_id'=>Auth::user()->id, 'file'=>$name, 'file_size'=>$size, 'type'=>$type]);
        Review::create(['user_id'=> Auth::user()->id, 'name'=> ucfirst(Auth::user()->name), 'email'=> Auth::user()->email, 'file'=>$name, 'size'=>$size]);
    }


    public function delete_from_nerd_server($id){
        $file= Nerdserver::find($id);
        Session::flash('server_message', 'You have deleted "' . $file->file . '" from the server');
        unlink('nerd_folder/'. ucfirst(Auth::user()->name) .'/'.$file->file);
        $file->delete();
        return redirect('/nerdserver');
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
    public function store(Request $request)
    {
        //
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
    public function update(NerdRequest $request, $id)
    {
        $user= User::findOrFail($id);

        $input= $request->except('name', 'email');
        if ($request->hasFile('photo_id')) {
          $file= $request->file('photo_id');
          if ($user->photo_id) {
              if (file_exists($user->photo->file)) {
                  unlink($user->photo->file);
                  $user->photo->delete($user->photo_id);
              }
          }
          $name= time() . $file->getClientOriginalName();
          $file->move('nerd_images/', $name);
          $photo= Photo::create(['file'=>$name]);
          $input['photo_id']= $photo->id;
        }
        $user->update($input);

        Session::flash('message', ''. ucfirst($user->name) .'s profile has been updated');

       return redirect('/profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nerd= User::findOrFail($id);
        if ($nerd->photo_id){
            unlink($nerd->photo->file);
        }
        Session::flash('message', 'Nerd ' . $nerd->name . ' has been deleted');
        if ($nerd->photo_id){
            $nerd->photo->delete();
        }
        $nerd->delete();
        return redirect('/profile');
    }
}
