<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Moment;
use App\Moment_like;
use App\Person_information;
use App\Run;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        $Runs=Run::where('email',$user['email'])->get();

        $times_total=count($Runs);

        $distance_total=0;
        foreach ($Runs as $Run) {
            $distance_total=$distance_total+$Run['distance'];

        }
        $fire_total=round($distance_total*60*1.036,2);
        $followers_total=Follow::where('following_email',$user['email'])->count();
        $followings=Follow::where('follower_email',$user['email'])->get();
        $followings_total=count($followings);

        $moments=Moment::orderBy('id', 'desc')->get();
        $moments_get=array();//全部数据
        foreach ($moments as $moment){
            foreach ($followings as $following){
                if($moment['email']==$following['following_email']){
                    array_push($moments_get,$moment);
                }
            }
            if($moment['email']==$user['email']){
                array_push($moments_get,$moment);
            }
        }
        $show_moments=array();
        foreach ($moments_get as $moment){

            $like_num=Moment_like::where('moment_id',$moment['id'])->count();
            $islike=Moment_like::where('moment_id',$moment['id'])->where('like_email',$user['email'])->count();
            $inf=Person_information::where('email',$moment['email'])->first();
            $show_moment=array();
            $show_moment['moment_id']=$moment['id'];
            $show_moment['email']=$moment['email'];
            $show_moment['name']=$inf['name'];
            $show_moment['content']=$moment['content'];
            $show_moment['created_at']=Carbon::parse($moment['created_at'])->diffForHumans();
            $show_moment['headimg']=$inf['headimg'];
            $show_moment['sex']=$inf['sex'];
            $show_moment['like_num']=$like_num;
            $show_moment['islike']=$islike;

            array_push($show_moments,$show_moment);
        }


        return view('home',compact('user','information','fire_total','followings_total','followers_total','distance_total','times_total',
            'show_moments'));
    }

    public function postPublic(Request $request)
    {
        $user=\Auth::user();
        $moment=new Moment();
        $moment['email']=$user['email'];
        $moment['name']=$user['name'];
        $moment['content']=$request->get('content');
        $moment['created_at']=Carbon::now();
        $moment->save();
        return redirect('/home#moment');
//        $user=\Auth::user();
//        $user_name=$user['name'];
//        return view('home',compact('user_name'));
    }
    public function postLike(Request $request)
    {
//        return $request->get('moment_id');
        $user=\Auth::user();
        $moment_id=\Input::get('moment_id');
        $islike=Moment_like::where('moment_id',$moment_id)->where('like_email',$user['email'])->first();
        if($islike){
            Moment_like::where('moment_id',$moment_id)->where('like_email',$user['email'])->delete();
            return response()->json(array(
                'status' => 1,
                'msg' => 'quxiaolike',
            ));
        }else{
            $moment_like=new Moment_like();
            $moment_like['moment_id']=$moment_id;
            $moment_like['like_email']=$user['email'];
            $moment_like['created_at']=Carbon::now();
            $moment_like->save();
            return response()->json(array(
                'status' => 1,
                'msg' => 'like',
            ));
        }


//        $user=\Auth::user();

//        $user_name=$user['name'];
//        return view('home',compact('user_name'));
    }
    public function postDelete(Request $request)
    {
        $moment_id=\Input::get('moment_id');
        Moment::where('id',$moment_id)->delete();
        Moment_like::where('moment_id',$moment_id)->delete();
        return response()->json(array(
            'status' => 1,
            'msg' => 'ok',
        ));
//        $user=\Auth::user();
//        $user_name=$user['name'];
//        return view('home',compact('user_name'));
    }
    public function getOtherHome($email)
    {
        $user=\Auth::user();
        if(!User::where('email',$email)->first()){
            return redirect('/home#home');
        }
        if($email==$user['email']){
            return redirect('/home#home');
        }else{
            $my_information=Person_information::where('email',$user['email'])->first();
            $information=Person_information::where('email',$email)->first();
            $Runs=Run::where('email',$email)->get();

            $times_total=count($Runs);
            $distance_total=0;

            $isFollower=Follow::where('following_email',$email)->where('follower_email',$user['email'])->count();

            foreach ($Runs as $Run) {
                $distance_total=$distance_total+(string)$Run['distance'];
            }
            $fire_total=round($distance_total*60*1.036,2);
            $followers_total=Follow::where('following_email',$email)->count();
            $followings=Follow::where('follower_email',$email)->get();
            $followings_total=count($followings);

            $moments=Moment::where('email',$email)->orderBy('id', 'desc')->get();

            $show_moments=array();
            foreach ($moments as $moment){

                $like_num=Moment_like::where('moment_id',$moment['id'])->count();
                $islike=Moment_like::where('moment_id',$moment['id'])->where('like_email',$user['email'])->count();
                $show_moment=array();
                $show_moment['moment_id']=$moment['id'];
                $show_moment['email']=$moment['email'];
                $show_moment['name']=$information['name'];
                $show_moment['content']=$moment['content'];
                $show_moment['created_at']=Carbon::parse($moment['created_at'])->diffForHumans();
                $show_moment['headimg']=$information['headimg'];
                $show_moment['sex']=$information['sex'];
                $show_moment['like_num']=$like_num;
                $show_moment['islike']=$islike;

                array_push($show_moments,$show_moment);
            }

            return view('other',compact('isFollower','my_information','information','fire_total','followings_total','followers_total','distance_total','times_total',
                'show_moments'));
        }

    }

}
