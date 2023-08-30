<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'issue_title',
        'issue_description',
        'requester_name',
        'office_location',
        'attachments',
    ];

    public function emp()
    {
      //  return $this->belongsTo(User::class, 'employee_id');
        return $this->belongsTo(User::class, 'employee_id', 'emp_id');

    }

    public function parentdelivery()
    {
        return $this->hasOne(Delivery::class, 'support_id', 'id');
    }
}
