<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_title',
        'issue_description',
        'requester_name',
        'office_location',
        'attachments',
    ];
}
