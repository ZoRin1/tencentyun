<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person_information;
use App\Run;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSport()
    {
        //
        $user=\Auth::user();
        $information=Person_information::where('id',$user['id'])->first();
        $Runs=Run::where('email',$user['email'])->get();

        $week_runs=Run::where('email',$user['email'])->whereBetween('start_time',[Carbon::now()->subDays(7),Carbon::now()])->get();
        $week_distance=0;
        $week_step=0;
        foreach ($week_runs as $week_run){
            $week_distance=$week_distance+$week_run['distance'];
            $week_step=$week_step+$week_run['steps'];
        }
        $distance_total=0;
        $run_Date=array();
        $run_distance=array();
        $run_step=array();
        foreach ($Runs as $Run) {
            $distance_total=$distance_total+$Run['distance'];
            array_push($run_Date,$Run['start_time']);
            array_push($run_distance,$Run['distance']);
            array_push($run_step,$Run['steps']);
        }
        $times_total=count($Runs);
        $fire_total=round($distance_total*60*1.036,2);

        return view('sport',compact('information','week_distance','week_step','distance_total','times_total','fire_total'));
    }
    public function postSport(Request $request){
        $user=\Auth::user();
        $Runs=Run::where('email',$user['email'])->get();
        $run_Date=array();
        $run_distance=array();
        $run_step=array();
        foreach ($Runs as $Run) {
            array_push($run_Date,$Run['start_time']);
            array_push($run_distance,$Run['distance']);
            array_push($run_step,$Run['steps']);
        }
        return response()->json(array('status' => 1,'date'=>$run_Date,'distance'=>$run_distance,'step'=>$run_step));
    }

    public function productRuns(){
        $user=\Auth::user();
        $base=Carbon::create(2016,10,1,8,30,0);
        for($i=0;$i<100;$i++){

            $run=new Run();
            $start_time=$base->addDay();
            $time=rand(10,60);
            $end_time=$base->addMinutes($time);
            $base->subMinutes($time);

            $steps=rand(2000,20000);
            $distance=$steps/(rand(1800,2200));

            $distance=round($distance,2);

            $run['email']=$user['email'];
            $run['distance']=$distance;
            $run['steps']=$steps;
            $run['start_time']=$start_time;
            $run['end_time']=$end_time;
            $run['created_at']=$end_time;

            $run->save();
        }
        return redirect('/');

    }
    public function deleteRuns(){
        $user=\Auth::user();
        Run::where('email',$user['email'])->delete();
        return redirect('/');
    }


}
