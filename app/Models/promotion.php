<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $primaryKey = 'promo_id';
    protected $fillable = ['promo_value', 
	'booking_limit', 
	'promo_text',];
    use HasFactory;
}