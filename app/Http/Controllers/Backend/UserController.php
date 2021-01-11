<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function viewUser()
    {
        $datas = User::all();
//        return $datas;
//        dd('datas');
        return view('admin.user.view-user',['datas' => $datas]);
    }
    public function addUser()
    {
        return view('admin.user.add-user');
    }
    public function saveUser(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required|unique:users,email',
        ]);
        $user = new User();
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.view')->with('message','Your Information Saved Successfully');

    }
    public function editUser($id)
    {
//        dd($id);
        $user = User::find($id);
        return view('admin.user.edit-user',['user' => $user]);
    }
    public function updateUser(Request $request)
    {
        $user  = User::find($request->user_id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.view')->with('message','Your Information has been updated successfully!!!');
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if(file_exists('public/upload/user_images/' .$user->image)
            AND !empty($user->image))
        {
            unlink('public/upload/user_images/' .$user->image);
        }
        $user->delete();

        return redirect()->route('users.view')->with('message','Your Information has been deleted successfully!!!!!!!!');
    }
}
