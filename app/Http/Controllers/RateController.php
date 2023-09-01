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
    public function rating(Request $request)
    {
        $emp = User::all();
        $stars_rated = $request->input('solve_rating');
        $star_message=$request->input('solve_message');
        $emp_id = $request->input('emp_id');
        $emp_check = User::where('emp_id', $emp_id)->first();
        if ($emp_check) {
            Rates::create([
                'emp_id'=>$emp_id,
                'message'=>$star_message,
                'rating'=>$stars_rated
            ]);
        } else {
            return redirect()->back()->with('status','You cannot rate ');
        }
        return view('pages.employees.notification', compact('emp'));
    }
}
