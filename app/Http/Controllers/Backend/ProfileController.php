<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function viewProfile()
    {
//        dd('ok');
        $id = Auth::user()->id;
        $user = User::find($id);
//        dd($user);
        return view('admin.user.view-profile',['user' => $user]);
    }
    public function saveProfile(Request $request)
    {

    }
    public function editProfile($id)
    {
//        dd('ok');
//        $user = User::find($id);
//        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.edit-profile',['user'=> $user]);
    }
    public function updateProfile(Request $request)
    {
        $user  = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$user->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image']=$filename;
        }
        $user->save();
        return redirect()->route('profiles.view')->with('message','Your Profile has been updated successfully!!!');
    }
    public function passwordView() {
//        dd('ok');
        return view('admin.user.edit-password');
    }
    public function passwordUpdate(Request $request) {
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password]))
        {
//            dd('ok');
            $user = User::find(Auth::User()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('message','Password changed successfully');
        }
        else{
//            dd('error');
            return redirect()->back()->with('error','Sorry your current password does not match!!!');

        }

    }
}
