<?php

namespace App\Http\Controllers;
use App\Models\train_station;
use Illuminate\Support\Facades\View;
use App\Models\train;
use App\Models\train_schedule;

use Illuminate\Http\Request;

class stationController extends Controller
{
    //view Add Stations

    function viewAddStations(){

        
        if (session()->has('AName')) {


            $latestStationId = train_station::max('st_no');
            $nextStationId =  $latestStationId + 1;

            return View::make('add_stations')->with('data', $nextStationId);
        }
        return view('admin_login');

    }

    function addStationsToDb(Request $req){
        $req->validate([
            'st_no' => 'required',
            'st_name' => 'required', 
            'ft_class_seat' => 'required', 
            'snd_class_seat' => 'required', 
            'trd_class_seat' => 'required', 

        ]);


        try {
            // Insert the new Train Station record to db

            $train_station = new train_station();

            $train_station->st_no = $req->st_no;
            $train_station->st_name = $req->st_name;
            $train_station->ft_class_seat = $req->ft_class_seat;
            $train_station->snd_class_seat = $req->snd_class_seat;
            $train_station->trd_class_seat = $req->trd_class_seat;
            $rec  = $train_station->save();

            if ($rec) {
                return back()->with('success', 'You have successfully Add a Train Station');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                // Duplicate entry error
                return back()->with('fail', 'The Train Station already added.');
            } else {
                // Other query exceptions
                return back()->with('fail', 'Something went wrong. Please try again.');
            }
        } 

    }

    // View Train Station record

    function viewStations(){

        if (session()->has('AName')) {

            $data =  train_station::all();
            return view('view_station',['stations'=>$data]);
            }
        return view('admin_login');
       
    }


    
    function stationEdtview($id){

        $data = train_station::where('st_no', $id)->first();

        return view('edit_station',['data'=>$data]);

    }


    function updateStation(Request $req){

        $req->validate([
            'st_no' => 'required',
            'st_name' => 'required', 
            'ft_class_seat' => 'required', 
            'snd_class_seat' => 'required', 
            'trd_class_seat' => 'required', 

        ]);

        try {
            // update the new Train Station record to db

            $train_station = train_station::find($req->st_no);

            $train_station->st_no = $req->st_no;
            $train_station->st_name = $req->st_name;
            $train_station->ft_class_seat = $req->ft_class_seat;
            $train_station->snd_class_seat = $req->snd_class_seat;
            $train_station->trd_class_seat = $req->trd_class_seat;
            $rec  = $train_station->save();

            if ($rec) {
                return back()->with('success', 'You have successfully updated  Train Station');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                // Duplicate entry error
                return back()->with('fail', 'The Train Station already added.');
            } else {
                // Other query exceptions
                return back()->with('fail', 'Something went wrong. Please try again.');
            }
        } 

    }
    

    function stationDelete($id){

        $data = train_station::where('st_no', $id)->first();
        $data->delete();

        return redirect('view_train_stations');
    
    }
}
