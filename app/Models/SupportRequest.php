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
    public function acceptancet()
    {

        return $this->belongsTo(Acceptance::class, 'support_id', 'id');

    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'emp_id');
    }

        public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'support_id');
    }
}
