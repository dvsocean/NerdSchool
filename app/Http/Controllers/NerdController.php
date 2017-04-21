<?php

namespace App\Http\Controllers;

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

        $input= $request->except('name');
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

        Session::flash('message', 'UPDATED SUCCESSFUL');

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
        //
    }
}
