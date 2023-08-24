<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    use HasFactory;


    protected $fillable = [
        'assigned', 'maintenance_location', 'delivery_time',
        'receiver', 'received_device', 'problem_id', 'employee_id',
    ];



}
