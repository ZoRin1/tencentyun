<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Person_information;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFriends()
    {
        //
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        $followers=Follow::where('following_email',$user['email'])->get();//粉丝
        $followings=Follow::where('follower_email',$user['email'])->get();//关注

        $following_arrs=array();
        foreach($followings as $following){
            $following_arr=array();
            $following_inf=Person_information::where('email',$following['following_email'])->first();
            $following_arr['email']=$following_inf['email'];
            $following_arr['name']=$following_inf['name'];
            $following_arr['sex']=$following_inf['sex'];
            $following_arr['city']=$following_inf['city'];
            $following_arr['interest']=$following_inf['interest'];
            $following_arr['headimg']=$following_inf['headimg'];
            if(Follow::where('following_email',$user['email'])->where('follower_email',$following['following_email'])->first()){
                $following_arr['isEachOther']=true;
            }else{
                $following_arr['isEachOther']=false;
            }
            array_push($following_arrs,$following_arr);
        }


        $follower_arrs=array();
        foreach($followers as $follower){
            $follower_arr=array();
            $follower_inf=Person_information::where('email',$follower['follower_email'])->first();
            $follower_arr['email']=$follower_inf['email'];
            $follower_arr['name']=$follower_inf['name'];
            $follower_arr['sex']=$follower_inf['sex'];
            $follower_arr['city']=$follower_inf['city'];
            $follower_arr['interest']=$follower_inf['interest'];
            $follower_arr['headimg']=$follower_inf['headimg'];
            if(Follow::where('follower_email',$user['email'])->where('following_email',$follower['follower_email'])->first()){
                $follower_arr['isEachOther']=true;
            }else{
                $follower_arr['isEachOther']=false;
            }
            array_push($follower_arrs,$follower_arr);
        }
        $followers_num=$followers->count();
        $followings_num=$followings->count();
        return view('friends',compact('user','followers_num','followings_num','information','following_arrs','follower_arrs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postFollowing(Request $request)
    {
        //
        $user=\Auth::user();
        if(Follow::where('follower_email',$user['email'])->where('following_email',$request['email'])->first()){
            Follow::where('follower_email',$user['email'])->where('following_email',$request['email'])->delete();
        }else{
            $follow=new Follow();
            $follow['following_email']=$request['email'];
            $follow['follower_email']=$user['email'];
            $follow['created_at']=Carbon::now();
            $follow->save();
        }
        return response()->json(array(
            'status' => 1,
            'msg' => 'ok',
        ));
    }


}
