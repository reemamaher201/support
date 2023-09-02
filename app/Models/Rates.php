<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;

    protected $table = 'rates';
    protected $fillable = ['status',
        'support_id', 'employee_id', 'emp_support_id','rating','comment'];



}
