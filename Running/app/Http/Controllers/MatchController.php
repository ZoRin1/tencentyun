<?php

namespace App\Http\Controllers;

use App\Match;
use App\Match_relate;
use App\Match_result;
use App\Person_information;
use App\Run;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMatch()
    {
        //
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        $match_ends=Match::where('end_time','<',Carbon::now())->get();

        foreach ($match_ends as $match_end){
            if(!Match_result::where('match_id',$match_end['id'])->first()){
                $match_joins=Match_relate::where('match_id',$match_end['id'])->get();
                if($match_joins->count()!=1){

                        $steps_email=$match_joins[$match_joins->count()-1]['email'];
                        $distances_email=$match_joins[$match_joins->count()-1]['email'];
                        $steps=0;
                        $distances=0;
                        foreach ($match_joins as $match_join){
                            $steps_temp=Run::whereBetween('start_time',[$match_end['start_time'],$match_end['end_time']])->where('email',$match_join['email'])->sum('steps');
                            $distances_temp=Run::whereBetween('start_time',[$match_end['start_time'],$match_end['end_time']])->where('email',$match_join['email'])->sum('distance');
                            if($steps_temp>$steps){
                                $steps=$steps_temp;
                                $steps_email=$match_join['email'];
                            }
                            if($distances_temp>$distances){
                                $distances=$distances_temp;
                                $distances_email=$match_join['email'];
                            }
                        }
                        $match_result=new Match_result();
                        $match_result['match_id']=$match_end['id'];
                        if($match_end['type']=='mubiao'){
                            $match_result['email']=$steps_email;
                        }else{
                            $match_result['email']=$distances_email;
                        }

                        $match_result['created_at']=$match_end['end_time'];
                        $match_result->save();

                }

            }
        }
        $join_count=Match_relate::where('email',$user['email'])->count();
        $win_count=Match_result::where('email',$user['email'])->count();
        if($join_count==0){
            $winning=0;
        }else{
            $winning=round($win_count/$join_count,4)*100;
        }

        $matchs=Match::orderBy('id', 'desc')->get();
        $match_all=array();
        $match_my=array();
        $match_danren=array();
        $match_duoren=array();
        $match_mubiao=array();
        foreach ($matchs as $match){
            $match_li=array();
            $match_li['id']=$match['id'];
            $match_li['content']=$match['content'];
            $match_li['maxNum']=$match['maxNum'];
            $match_li['join_num']=Match_relate::where('match_id',$match['id'])->count();
            $start=Carbon::parse($match['start_time']);
            $end=Carbon::parse($match['end_time']);
            if($start->lt(Carbon::now())){
                if($end->lt(Carbon::now())){
                    $match_li['state']='end';
                    $seconds=strtotime(Carbon::now())-strtotime($end);
                }else{
                    $match_li['state']='ing';
                    $seconds=strtotime($end)-strtotime(Carbon::now());
                }
            }else{
                $match_li['state']='ready';
                $seconds=strtotime($start)-strtotime(Carbon::now());
            }

            $match_li['day']=floor($seconds/3600/24);
            $match_li['hour']=floor($seconds/3600)-24*$match_li['day'];
            $match_li['minute']=floor($seconds/60)-(24*$match_li['day']+$match_li['hour'])*60;
            $match_li['type']=$match['type'];
            array_push($match_all,$match_li);
            if($match_li['type']=='danren'){
                array_push($match_danren,$match_li);
            }else if($match_li['type']=='duoren'){
                array_push($match_duoren,$match_li);
            }else{
                array_push($match_mubiao,$match_li);
            }
            if(Match_relate::where('email',$user['email'])->where('match_id',$match['id'])->first()){
                array_push($match_my,$match_li);
            }

        }

        return view('match',compact('information','winning','match_all','match_my','match_danren','match_duoren','match_mubiao'));
    }
    public function postMatch(Request $request)
    {
        //
        $dateTime=$request['reservationtime'];
        if(preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}) - ([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2})$/s",$dateTime)
            ||preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2}) - ([0-9]{4})-([0-9]{2})-([0-9]{2})$/s",$dateTime)){
            $match=new Match();
            $type=$request['bisaileixing'];
            $match['type']=$type;
            $match['content']=$request['jieshao'];

            if($type=='danren'){
                $match['maxNum']=2;
            }else{
                $match['maxNum']=$request['number'];
            }
            $times=explode(' ',$request['reservationtime']);
            if($type=='mubiao'){
                $match['steps']=$request['mubiao'];
                $match['start_time']=$times[0]." 00:00:00";
                $match['end_time']=$times[2]." 00:00:00";
            }
            else{
                $match['start_time']=$times[0]." ".$times[1].":00";
                $match['end_time']=$times[3]." ".$times[4].":00";
            }
            $match['created_at']=Carbon::now();
            $match->save();

            $match_relate=new Match_relate();
            $match_relate['match_id']=$match['id'];
            $match_relate['email']=\Auth::user()['email'];
            $match_relate['created_at']=Carbon::now();
            $match_relate->save();
            return redirect('match#Arena');
        }else{
            return redirect('match#Launch_competition');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMatchInformation($id)
    {
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();

        $join_count=Match_relate::where('email',$user['email'])->count();
        $win_count=Match_result::where('email',$user['email'])->count();
        if($join_count==0){
            $winning=0;
        }else{
            $winning=round($win_count/$join_count,4)*100;
        }

        if(Match::where('id',$id)->first()){
            $match=Match::where('id',$id)->first();
            $match_inf=array();
            $match_inf['id']=$match['id'];
            $match_inf['content']=$match['content'];
            $match_inf['maxNum']=$match['maxNum'];
            $match_inf['join_num']=Match_relate::where('match_id',$match['id'])->count();
            $match_inf['join_inf']=array();
            $match_inf['isjoin']=false;
            $match_joins=Match_relate::where('match_id',$match['id'])->get();

            foreach ($match_joins as $match_join){
                if($match_join['email']==$user['email']){
                    $match_inf['isjoin']=true;
                }
                $join_inf=array();
                $person_inf=Person_information::where('email',$match_join['email'])->first();
                $join_inf['email']=$person_inf['email'];
                $join_inf['name']=$person_inf['name'];
                $join_inf['headimg']=$person_inf['headimg'];
                $join_inf['steps']=Run::whereBetween('start_time',[$match['start_time'],$match['end_time']])->where('email',$match_join['email'])->sum('steps');
                $join_inf['distance']=Run::whereBetween('start_time',[$match['start_time'],$match['end_time']])->where('email',$match_join['email'])->sum('distance');
                if($join_inf['steps']==null){
                    $join_inf['steps']=0;
                }
                if($join_inf['distance']==null){
                    $join_inf['distance']=0;
                }
                array_push( $match_inf['join_inf'],$join_inf);
            }
            $start=Carbon::parse($match['start_time']);
            $end=Carbon::parse($match['end_time']);

            $match_inf['start']=$start;
            $match_inf['end']=$end;
            if($start->lt(Carbon::now())){
                if($end->lt(Carbon::now())){
                    $match_inf['state']='end';
                    $seconds=strtotime(Carbon::now())-strtotime($end);
                }else{
                    $match_inf['state']='ing';
                    $seconds=strtotime($end)-strtotime(Carbon::now());
                }
            }else{
                $match_inf['state']='ready';
                $seconds=strtotime($start)-strtotime(Carbon::now());
            }
            $match_inf['day']=floor($seconds/3600/24);
            $match_inf['hour']=floor($seconds/3600)-24*$match_inf['day'];
            $match_inf['minute']=floor($seconds/60)-(24*$match_inf['day']+$match_inf['hour'])*60;
            $match_inf['type']=$match['type'];

            $match_inf['rank']=$match_inf['join_inf'];
           if($match_inf['type']=='mubiao'){
               $newArr=array();
               for($j=0;$j<count($match_inf['rank']);$j++){
                   $newArr[]=$match_inf['rank'][$j]['steps'];
               }
               array_multisort($newArr, SORT_DESC,$match_inf['rank']);
           }else{
               $newArr=array();
               for($j=0;$j<count($match_inf['rank']);$j++){
                   $newArr[]=$match_inf['rank'][$j]['distance'];
               }
               array_multisort($newArr, SORT_DESC,$match_inf['rank']);
           }
            return view('matchInformation',compact('information','winning','match_inf'));
        }
        else{
            return redirect('match#Arena');
        }

    }
    public function postJoin(Request $request)
    {
        //
        $user=\Auth::user();
        $match_id=$request['match_id'];

        if(Match_relate::where('match_id',$match_id)->where('email',$user['email'])->first()){
            Match_relate::where('match_id',$match_id)->where('email',$user['email'])->delete();
            if(Match_relate::where('match_id',$match_id)->count()==0){
                Match::where('id',$match_id)->delete();
            }
            return response()->json(array(
                'status' => 1,
                'refresh' => 1,
            ));
        }else{
            $match_relate=new Match_relate();
            $match_relate['match_id']=$match_id;
            $match_relate['email']=$user['email'];
            $match_relate['created_at']=Carbon::now();
            $match_relate->save();
            return response()->json(array(
                'status' => 1,
                'refresh' =>0,
            ));
        }
    }
}
