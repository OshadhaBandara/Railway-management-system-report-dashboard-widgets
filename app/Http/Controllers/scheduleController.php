<?php

namespace App\Http\Controllers;

use App\Mail\DelaySchedule;
use App\Models\passenger;
use App\Models\train_station;
use App\Models\train;
use App\Models\train_schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TickeReceipt;
use App\Models\ticket;
use App\Mail\cancelSchedule;

class scheduleController extends Controller
{
/*     public function authCheck()
    {
        
        if (session()->has('AName')) {
            return true;
        }else{
            return view('user_login');
        }
        
    } */

    function addSchedule(){
        if(session()->has('AName')){
              

            $st_data = train_station::orderBy('st_name','ASC')->get();
            $tr_data = train::orderBy('train_name','ASC')->get();
            $data = array(
             'stations' => $st_data,
             'trains' =>$tr_data 
            );
            return view('create_schedule')->with(['data'=>$data]);
        } 
        return redirect('admin');
    }
    public function createSchedule(Request $req)
    {
        if(session()->has('AName')){
        $req->validate([
            'schedule_date' => 'required',
            'stations' => 'required', 
            'train_id' => 'required', 
            'start_station' => 'required', 
            'start_time' => 'required', 
            'end_station' => 'required',
            'end_time' => 'required',

        ]);

        try {
            $schedule_data = array(
                'schedule_date'=>$req->schedule_date, 
                'stations'=>implode(",",$req->stations), 
                'train_id'=>$req->train_id, 
                'start_station'=>$req->start_station, 
                'start_time'=>$req->start_time, 
                'end_station'=>$req->end_station, 
                'end_time'=>$req->end_time, 
                'class_1_seats'=>$req->class_1,
                'class_2_seats'=>$req->class_2,
                'class_3_seats'=>$req->class_3,
                'status'=>0, 
            );
           
            $savedata = train_schedule::create($schedule_data)->save();

            if($savedata){
                return back()->with('success', 'You have successfully Create a shcedule');
            }

        } catch (\Throwable $th) {
            return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
    return redirect('admin');
        
    }

    public function viewSchedules(Request $req)
    {
        if(session()->has('AName')){
            $sched_data = train_schedule::select('train_schedules.*','trains.train_name')->join('trains','trains.train_id','train_schedules.train_id')->where('is_active',1)->orderBy('schedule_id','DESC')->get();
            $st_data = train_station::orderBy('st_name','ASC')->get();

            $data = array(
             'schedules' => $sched_data,
             'stations' => $st_data,
            );
            return view('view_schedules')->with(['data'=>$data]);
        }
        return redirect('admin');
    }

    public function updateSchedule(Request $req)
    {
        if(session()->has('AName')){

            $sched_data = train_schedule::where('schedule_id',$req->id)->get();
            $st_data = train_station::orderBy('st_name','ASC')->get();
            $tr_data = train::orderBy('train_name','ASC')->get();

            $data = array(
             'schedule' => $sched_data,
             'stations' => $st_data,
             'trains' =>$tr_data 
            );
            
            return view('edit-schedule')->with(['data'=>$data]);
        }
        return redirect('admin');
    }

    public function reschedule(Request $req)
    {
        if(session()->has('AName')){
            $sched_data = train_schedule::where('schedule_id',$req->id)->get();
            $st_data = train_station::orderBy('st_name','ASC')->get();
            $tr_data = train::orderBy('train_name','ASC')->get();
            $data = array(
             'schedule' => $sched_data,
             'stations' => $st_data,
             'trains' =>$tr_data 
            );
            return view('reschedule')->with(['data'=>$data]);
        }
        return redirect('admin');
    }
    
    public function editSchedule(Request $req)
    {
        if(session()->has('AName')){



            try{

           
            $update_schedule= train_schedule::where('schedule_id',$req->id)->update([
                'schedule_date'=>$req->schedule_date, 
                'stations'=>implode(",",$req->stations), 
                'train_id'=>$req->train_id, 
                'start_station'=>$req->start_station, 
                'start_time'=>$req->start_time, 
                'end_station'=>$req->end_station, 
                'end_time'=>$req->end_time, 
                'class_1_seats'=>$req->class_1,
                'class_2_seats'=>$req->class_2,
                'class_3_seats'=>$req->class_3,
            ]) ;


            if($update_schedule){
                 return redirect('view_schedules')->with('success', 'You have successfully updated the shcedule');
            }
        }
        catch (\Throwable $th) {
            return back()->with('fail', 'Something went wrong. Please try again.');
        }




        }
        return redirect('admin');
    }

    public function createReschedule(Request $req)
    {
        if(session()->has('AName')){
        $req->validate([
            'schedule_date' => 'required',
            'stations' => 'required', 
            'train_id' => 'required', 
            'start_station' => 'required', 
            'start_time' => 'required', 
            'end_station' => 'required',
            'end_time' => 'required',

        ]);

        try {
            $schedule_data = array(
                'schedule_date'=>$req->schedule_date, 
                'stations'=>implode(",",$req->stations), 
                'train_id'=>$req->train_id, 
                'start_station'=>$req->start_station, 
                'start_time'=>$req->start_time, 
                'end_station'=>$req->end_station, 
                'end_time'=>$req->end_time, 
                'class_1_seats'=>$req->class_1,
                'class_2_seats'=>$req->class_2,
                'class_3_seats'=>$req->class_3,
                'status'=>0, 
            );
           
            $savedata = train_schedule::create($schedule_data)->save();

            if($savedata){
                return back()->with('success', 'Re-Schedule Created Successfully');
            }

        } catch (\Throwable $th) {
            dd($th->getMessage());
            // return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
    return redirect('admin');
        
    }
    public function deleteSchedule($id){

        if(session()->has('AName')){

            $trainId = ticket::where('train_id',$id)->get(); 
            
            
                    foreach($trainId as $tId){
                        
                    $passenger = passenger::where('train_id',$tId->passenger_id)->get(); //get related data
            
                   
                    //send mails loop start
                    foreach($passenger as $passenger){
            
                         // $data for email template
                      $details  = [
    
                      ];
            
                    Mail::to($passenger->email)->send(new DelaySchedule($details));  
                    }
                } 

            

                        $data = train_schedule::find($id);
                        $data->update(['is_active'=>0]);

                        return redirect('view_schedules');

                 }
                 return redirect('admin');
                    
    }


    function delaySchedule(Request $req){

        
        $hrs = $req->hours==''?00:$req->hours;
        $mins = $req->mins==''?00:$req->mins;
        //Get all the tickets with the specified train_id
        $tickets = Ticket::where('schedule_id',$req->id)->get();
        $schedule = train_schedule::where('schedule_id',$req->id)->first();
        $update_schedule = train_schedule::where('schedule_id',$req->id)->update(['delay'=>$hrs.":".$mins]);
        // Loop through each ticket
        foreach ($tickets as $ticket) {

            
   
            $passengerId = $ticket->passenger_id;

            //Get the passenger's email address using the passenger_id
            $passenger = Passenger::where('passenger_id', $passengerId)->first();

            if ($passenger) {

                $passengerEmail = $passenger->email;

                      // Pass ticket details to the email template
            $details = [
                'train_name' => $ticket->train_name,
                'start_station' => $ticket->start_station,
                'end_station' => $ticket->end_station,
                'start_time' => $ticket->start_time,
                'end_time' => $ticket->end_time,
                'delay' => $schedule->delay,

            ];

                //send email
                Mail::to($passengerEmail)->send(new DelaySchedule($details));  
            }
           
        }

    return redirect()->back()->with('success', 'Delay Updated Successfully');;
    }


    function cancelSchedule($id){
            

 



        //Get all the tickets with the schedule_id 
        $tickets = Ticket::where('schedule_id',$id)->get();
        $schedule = train_schedule::where('schedule_id',$id)->first();

        // Loop through each ticket
        foreach ($tickets as $ticket) {

            
   
            $passengerId = $ticket->passenger_id;

            //Get the passenger's email address using the passenger_id
            $passenger = Passenger::where('passenger_id', $passengerId)->first();

            if ($passenger) {

                $passengerEmail = $passenger->email;

                      // Pass ticket details to the email template
            $details = [
                'train_name' => $ticket->train_name,
                'start_station' => $ticket->start_station,
                'end_station' => $ticket->end_station,
                'start_time' => $ticket->start_time,
                'end_time' => $ticket->end_time,
                'delay' => $schedule->delay,

            ];

                //send email
                Mail::to($passengerEmail)->send(new cancelSchedule($details));   
            }
        }

        }
        
    public function updateLocation(Request $req)
    {   
       
        $data = explode(",", $req->location);
        $update_schedule = train_schedule::where('schedule_id',$req->id)->update(['track_station'=>$data[0],'track_station_text'=>$data[1]]);
        return redirect()->back()->with('success', 'Tracking Location Updated Successfully');;
    }

}