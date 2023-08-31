<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['support_id','recipient_name','delivery_place','delivery_time'];
    public function acceptances()
    {
        return $this->belongsTo(Acceptance::class, 'support_id', 'id');

    }
}

