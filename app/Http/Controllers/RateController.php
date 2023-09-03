<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\Delivery;
use App\Models\Rates;
use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RateController extends Controller
{
    public function showRating($id)

    {
        $delivery = Delivery::findorfail($id);

         $acceptance = Acceptance::findorfail($id);
         $support = SupportRequest::findorfail($id);
        return view('pages.employees.rating',compact( 'delivery','acceptance','support'));
    }


    public function submitRating(Request $request,$id)
    {
        $support = SupportRequest::findOrFail($id);
        $support->status = 4;
        $support->save();


        Rates::create([
            'support_id'=>$request->input('support_id'),
            'emp_support_id'=>$request->input('emp_support_id'),
            'employee_id' =>$request->input('employee_id'),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('home');
    }

    public function showEmployeeEvaluations()
    {
        $currentEmployee = Auth::user();
        $employeeEvaluations = Rates::where('emp_support_id', $currentEmployee->emp_id)->get();
        return view('pages.supporter.show_evaluations', ['evaluations' => $employeeEvaluations]);
    }
}
