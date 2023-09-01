<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\Delivery;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function showSubmit($id)
    {
        $notification = Notification::findOrFail($id);

        $acceptances = Acceptance::find($id);

        return view('pages/supporter/submitProcess', compact('acceptances', 'notification'));
    }

    public function storeSubmit(Request $request, $id)
    {


        $acceptance = Acceptance::find($id);
        // التحقق من البيانات المدخلة من قبل المستخدم
        $validatedData = $request->validate([
            'recipient_name' => 'required|string',
            'delivery_place' => 'required|string',
            'delivery_time' => 'required|date',
        ]);

        // إنشاء سجل جديد في جدول "delivery"
        $delivery = Delivery::create([
            'support_id' => $acceptance->id,
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

            $acceptances = Acceptance::find($id);

            return view('index', compact('acceptances'));
        }

        return view('s');
    }


}
