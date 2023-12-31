<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    use HasFactory;


    protected $fillable = [
        'assigned', 'maintenance_location', 'delivery_time',
        'receiver', 'received_device', 'support_id', 'employee_id', 'procedures_token', 'procedures_status','procedures_time', 'spare_name','method_spare','savingSpare_time','emp_support_id'];

    public function support(){
        return $this->hasOne(SupportRequest::class,'support_id');
    }

}
