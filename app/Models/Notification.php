<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'subject', 'message', 'status'];

    // تعريف العلاقة مع جدول الموظفين
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'emp_id');
    }

}
