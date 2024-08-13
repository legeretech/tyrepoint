<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_info extends Model
{
    use HasFactory;
    protected $fillable = ['registration_no', 'vehicle_model', 'vehicle_type', 'vehicle_name','ODO_meter_reading','previous_align','KM_after_previous_align','average_run_per_day'];
}
