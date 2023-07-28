<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class train_schedule extends Model
{
    protected $primaryKey = 'schedule_id';
    use HasFactory;
    protected $fillable = [
        'schedule_date', 
        'stations', 
        'train_id', 
        'start_station', 
        'start_time', 
        'end_station', 
        'end_time', 
        'status', 
        'class_1_seats',
        'class_2_seats',
        'class_3_seats',
        'booked_class_1_seats',
        'booked_class_2_seats',
        'booked_class_3_seats',
        'is_active'
    ];
}
