<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['support_id','recipient_name','delivery_place','delivery_time','employee_id','emp_support_id'];
    public function acceptances()
    {
        return $this->belongsTo(SupportRequest::class, 'support_id', 'id');

    }

    // في نموذج المستخدم User.php
    public function ratings()
    {
        return $this->hasMany(Rates::class);
    }

}

