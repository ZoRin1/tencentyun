<?php

namespace App\Http\Controllers;

use App\Person_information;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        //
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        return view('user',compact('user','information'));
    }
    public function postInformation(Request $request)
    {
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        $information['name']=$request['name'];
        $information['sex']=$request['sex'];
        $information['birth']=$request['year']."-".(((int)$request['month'])+1)."-".(((int)$request['day'])+1);
        $information['city']=$request['place'];
        $information['interest']=$request['interest'];
        $information['message']=$request['message'];
        $information->save();
        $user['name']=$request['name'];
        $user->save();
        return redirect('/user#information');
//        //
//        return view('user');
    }
    public function postImg(Request $request)
    {
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
      $file=$request->file('image');
        if($file->isValid()){

            $extension = $file->getClientOriginalExtension();

            $newName = $user['email'].".".$extension;
            if(file_exists('img/head/'.$newName)){
                unlink('img/head/'.$newName);
            }
            $path = $file->move('img/head',$newName); //这里是缓存文件夹，存放的是用户上传的原图，这里要返回原图地址给flash做裁切用
            $information['headimg']=$newName;
            $information->save();
            return  redirect('/user#information');

        }
//        //
//        return view('user');
    }
    public function postPassword(Request $request)
    {
        $user=\Auth::user();
        $oldpassword=$request['oldpassword'];
        $newpassword=$request['newpassword'];
        $againpassword=$request['againpassword'];
        if($newpassword!=$againpassword){
            return "<p>新密码输入不一致，请重新输入<p><a href='/Running/public/user#account'>返回</a>";

        }
        if(!\Hash::check($oldpassword,$user['password'])){
            return "<p>密码错误，请重新输入<p><a href='/Running/public/user#account'>返回</a>";
        }
        $user['password']=bcrypt($newpassword);
        $user->save();
        return redirect('auth/logout');

//        return $oldpassword.$newpassword.$againpassword;
//        //
//        return view('user');
    }

}
