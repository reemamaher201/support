<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    use HasFactory;

    protected $table = 'rates';
    protected $fillable = [
        'support_id', 'employee_id', 'emp_support_id','rating','comment'];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'emp_id');
    }

}
