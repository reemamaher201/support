<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use App\Models\User;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function showRating()
    {
        return view('pages.employees.notification');
    }

}
