<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin/user', ['users'=>$users]);
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect('/dashboard/users');
    }
    public function update($userId,request $request){
        if($request->has('_token')){
        $name=$request->name;
        $email=$request->email;
        $created_at=$request->created_at;
        $type=$request->type;
        $type = ($type === "admin" ? 1 : 0);
        $active_status=$request->active_status;
        User::where('id' ,"$userId")->update(array('name'=>"$name",'email'=>"$email",'created_at'=>$created_at,'type'=>$type, 'active_status'=>$active_status));
        }else
        {
            $users = User::get();
            $user = User::where('id',$userId)->get();
            return view('admin/userUpdate', ['user'=>$user,'users'=>$users]);
        }
        return redirect('/dashboard/users');
    }
}
