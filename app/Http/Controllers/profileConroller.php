<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\train;
use App\Models\train_station;
use App\Models\passenger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\promotion;

class profileConroller extends Controller
{
    function getTrainData()
    {
       // Get the current date and time
       $currentDateTime = date('Y-m-d');

        if (session()->has('pName')) {


            $data = ticket::select('tickets.*','train_schedules.delay','train_schedules.track_station_text','train_schedules.stations','train_schedules.stations','train_schedules.start_time','train_schedules.end_time')->join('train_schedules','train_schedules.schedule_id','tickets.schedule_id')
            ->where('tickets.passenger_id', Session('passenger_id'))
            ->where('tickets.created_at', '>', $currentDateTime) // Check if the ticket end_time is greater than current date and time
            
            ->get();
    
                 

                    // Get all the records for the passenger where the ticket has expired
                    $history =ticket::select('tickets.*','train_schedules.delay','train_schedules.track_station_text','train_schedules.stations','train_schedules.stations','train_schedules.start_time','train_schedules.end_time')->join('train_schedules','train_schedules.schedule_id','tickets.schedule_id')
                    ->where('tickets.passenger_id', Session('passenger_id'))
                    ->where('tickets.created_at', '<', $currentDateTime) // Check if the ticket end_time is less than current date and time
                    ->get();

                    $Passenger = passenger::where('passenger_id', Session('passenger_id'))->first();
           
            
            return  view('profile',[
                
                'stations'=>train_station::orderBy('st_name','ASC')->get(),
                'promos'=>promotion::where('is_active',1)->get(),
                'item'=>$data,
                'history'=>$history,
                'Passenger'=>$Passenger,
            
            ]); 
            
        }
        return view('user_login');

        

    }

    
    function updatePassenger(Request $req){

        if (session()->has('pName')) {
    
            
            // Add validation 
            $req->validate([
                'firstName' => 'required',
                'LastName' => 'required',
                'email' => 'required|email',
                'tp_number' => 'required',
                'address' => 'required',
                'InputPassword' => 'required|min:6',
                'confirmInputPassword' => 'required|same:InputPassword',

                    ]);

                // Handle the registration process

            
            

        
            

        
            try {
                    // Update the new Passenger record

                    $newUser = passenger::find(Session('passenger_id'));

                    $newUser->passenger_id = $req->passenger_id;
                    $newUser->first_name = $req->firstName;
                    $newUser->last_name = $req->LastName;
                    $newUser->email = $req->email;
                    $newUser->password = Hash::make($req->InputPassword); // encrypt the password 
                    $newUser->tp_number = $req->tp_number;
                    $newUser->address =$req->address;
                    $rec  = $newUser->save();

                    if ($rec) {
                        return back()->with('success', 'You have successfully updated');
                    }

                } catch (\Illuminate\Database\QueryException $e) {

                    if ($e->getCode() === '23000') {
                        // Other query exceptions
                        return back()->with('fail', 'Something went wrong. Please try again.');
                    } 
        
                }  
        } 
        return redirect('admin'); 
     }


}
