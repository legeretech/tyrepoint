<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'telephone', 'registration_no','role_id','shop_id'];
}
