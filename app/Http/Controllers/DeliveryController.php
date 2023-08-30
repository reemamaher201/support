<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acceptance;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function showSubmit($id)
    {
        $acceptances = Acceptance::find($id);
        return view('pages/supporter/submitProcess', compact('acceptances'));
    }

    public function storeSubmit(Request $request)
    {
        // التحقق من البيانات المدخلة من قبل المستخدم
        $validatedData = $request->validate([
            'recipient_name' => 'required|string',
            'delivery_place' => 'required|string',
            'delivery_time' => 'required|date',
        ]);

        // إنشاء سجل جديد في جدول "delivery"
        $delivery = Delivery::create([
            'support_id'=>'',
            'recipient_name' => $validatedData['recipient_name'],
            'delivery_place' => $validatedData['delivery_place'],
            'delivery_time' => $validatedData['delivery_time'],
        ]);




        $delivery->save();

        return redirect()->back();
    }
}
