<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\Delivery;
use App\Models\Rates;
use App\Models\SupportRequest;
use Illuminate\Http\Request;


class RateController extends Controller
{
    public function showRating($id)

    {
        $delivery = Delivery::find($id);
        $rate = Rates::find($id);
         $acceptance = Acceptance::find($id);
         $support = SupportRequest::find($id);
        return view('pages.employees.rating',compact( 'rate' ,'delivery','acceptance','support'));
    }


    public function submitRating(Request $request)
    {

        Rates::create([
            'status'=>$request->input('status'),
            'support_id'=>$request->input('support_id'),
            'emp_support_id'=>$request->input('emp_support_id'),
            'employee_id' =>$request->input('employee_id'),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('home');
    }

}
