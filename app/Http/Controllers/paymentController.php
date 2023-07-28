<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TickeReceipt;
use Illuminate\Contracts\Session\Session;
use App\Models\train_station;
use App\Models\train_schedule;
use App\Models\promotion;
use App\Models\passenger;
use App\Models\ticket;

class paymentController extends Controller
{
    // make the payment

    function makePayment(Request $req){
          $update_ticket = ticket::where('tc_number',$req->id)->update(['paid_amount'=>$req->total,'payment_status'=>1]);
          if($update_ticket){
            $psnger = passenger::where('passenger_id',Session('passenger_id'))->first();
                $promos = promotion::where('is_active',1)->get();

                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
              
                  for ($i = 0; $i < 7; $i++) {
                      $index = rand(0, strlen($characters) - 1);
                      $randomString .= $characters[$index];
                  }
              
                $randomString;
                foreach ($promos as $key => $p) {
                  if($key==0){
                    if($psnger->booking_count >= $p->booking_limit && $psnger->promo_used==0){
                      $update_passenger = passenger::where('passenger_id',Session('passenger_id'))->update(['promo_id'=>$p->promo_id,'promo_code'=>$randomString,'promo_used'=>0]);
                      break;
                    }
                  }else{
                    if($psnger->booking_count >= $p->booking_limit && $psnger->promo_id==$promos[$key-1]['promo_id']){
                      $update_passenger = passenger::where('passenger_id',Session('passenger_id'))->update(['promo_id'=>$p->promo_id,'promo_code'=>$randomString,'promo_used'=>0]);
                      break;
                    }
                  } 
                }

                $details  = [
                 
                ];
                    Mail::to( Session('passenger_email'))->send(new TickeReceipt($details));  
                    return redirect('profile');
          }else{
           
           
            /*  $update_passenger = passenger::where('passenger_id',Session('passenger_id'))->decrement('booking_count');
            return redirect('/'); */
          }
        
    }

    public function loadCheckout(Request $req)
    {
      
      $list = decrypt($req->data);
      $list = explode(',', $list);
      $id = $list[0];
      $qry = train_schedule::select('train_schedules.*','trains.train_name')->join('trains','trains.train_id','train_schedules.train_id')->where('schedule_id',$id)->first();
      $psngr = $list[1]==""?1:$list[1];
      $cls = $list[2];
      $price = $list[3];
      $st_start = $list[4]==0?$qry->start_station:$list[4];
      $st_end = $list[5]==0?$qry->end_station:$list[5];
      $data = array(
        'schedule'=>$qry,
        'nofp'=>$psngr,
        'cls'=>$cls,
        'price'=>$price,
        'st_start'=>$st_start,
        'st_end'=>$st_end,
        'stations'=>train_station::orderBy('st_name','ASC')->get(),
        'promos'=>promotion::where('is_active',1)->get(),
        'passenger'=>passenger::where('passenger_id',Session('passenger_id'))->first()
      );
      return view('checkout')->with(['data'=>$data]);
      
    }

    public function createTicket(Request $req)
    {
       try {
        
            $sche_data = train_schedule::select('train_schedules.*','trains.train_name')->join('trains','trains.train_id','train_schedules.train_id')->where('schedule_id',$req->id)->first();
            
            $create_ticket = array(
              'passenger_id'=>Session('passenger_id'), 
              'schedule_id'=>$req->id,
              'amount'=>$req->total,
              'discount'=>$req->discount, 
              'start_station'=>$req->st_start, 
              'end_station'=>$req->st_end, 
              'train_id'=>$sche_data->train_id, 
              'train_name'=>$sche_data->train_name, 
              'seat_cat'=>$req->cls, 
              'seats'=>$req->seats
            );
           
            $savedata = ticket::create($create_ticket);
            $savedata->save();
            if($savedata){
                $update_passenger = passenger::where('passenger_id',Session('passenger_id'))->increment('booking_count');
                $cls_type = $req->cls==1?'booked_class_1_seats':(($req->cls==2)?'booked_class_2_seats':'booked_class_3_seats');
                $update_schedule = train_schedule::where('schedule_id',$req->id)->increment($cls_type,$req->seats);
                if((float)$req->discount>0){
                  $update_passenger = passenger::where('passenger_id',Session('passenger_id'))->update(['promo_used'=>1]);
                }
                

                $data = array(
                  'total'=>$req->total,
                  'ticket_id'=>$savedata->tc_number
                );
                
                 return view('payment')->with(['data'=>$data]);
            }

        } catch (\Throwable $th) {
             return back()->with('fail', 'Something went wrong. Please try again.');
        }
    }
    
}