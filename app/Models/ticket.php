<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{

	 protected $primaryKey = 'tc_number';
    use HasFactory;
    protected $fillable = [
        'passenger_id', 
		'schedule_id',
		'paid_amount',
	'amount', 
    'discount',
	'start_station', 
	'end_station', 
	'start_time', 
	'end_time', 
	'train_id', 
	'train_name', 
	'seat_cat', 
	'seats', 
    ];
}
