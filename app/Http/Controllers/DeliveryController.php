<?php

namespace App\Http\Controllers;


use App\Models\Acceptance;
use App\Models\Delivery;

use App\Models\Rates;
use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function showSubmit($id)
    {
        $acceptance = SupportRequest::findOrFail($id);
        $delivery= Delivery::find($id);


        return view('pages/supporter/submitProcess', compact( 'acceptance','delivery'));
    }

    public function storeSubmit(Request $request, $id)
    {

        $support = SupportRequest::findOrFail($id);
        $support->status = 3;
        $support->save();

        $acceptance = SupportRequest::find($id);
        // التحقق من البيانات المدخلة من قبل المستخدم
        $validatedData = $request->validate([
            'recipient_name' => 'required|string',
            'delivery_place' => 'required|string',
            'delivery_time' => 'required|date',
        ]);

        // إنشاء سجل جديد في جدول "delivery"
        $delivery = Delivery::create([
            'emp_support_id'=>Auth::user()->emp_id,
            'support_id' => $acceptance->id,
            'employee_id'=>$acceptance->employee_id,
            'recipient_name' => $validatedData['recipient_name'],
            'delivery_place' => $validatedData['delivery_place'],
            'delivery_time' => $validatedData['delivery_time'],
        ]);


        $delivery->save();

        return redirect()->back();
    }
    public function msgShow($id)
    {
        if (Auth::user()->emp_id == $id) {
            $rates = Rates::find($id);
            $acceptances = Acceptance::find($id);
            return view('index', compact('acceptances','rates'));
        }

        return redirect()->route('home');
    }


}
