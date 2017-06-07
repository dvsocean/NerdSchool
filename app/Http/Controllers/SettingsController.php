<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
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
    public function update(Request $request, $id)
    {
        $user= User::findOrFail($id);
        $input['notifyEmail']= $request->input('notifyEmail');
        $user->update($input);
        return redirect('settings');
    }

    public function updateEmailAddress(Request $request){
        $user= User::findOrFail($request->input('id'));
        $input['email']= $request->input('new_email');
        $user->update($input);
        Session::flash('message', 'Your email has been updated successfully');
        return redirect('profile');
    }

    public function ajaxVerifyEmail(Request $request){
        $user= Auth::user();
        if($user->email == $request->email){
            return"EMAIL IS VALID";
        }
    }

    public function ajaxVerifyPassword(Request $request){
        $user= User::findOrFail($request->input('user_id'));

        if(Hash::check($request->input('old_password'), $user->password)){
            return"PASSWORD CONFIRMED";
        }
    }

    public function changePassword(Request $request){
        $user= User::findOrFail($request->input('user_id'));
        $new_pass['password']= Hash::make($request->input('new_password'));
        $user->update($new_pass);

        Session::flash('message', 'Your password has been updated');
        return redirect('profile');
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
