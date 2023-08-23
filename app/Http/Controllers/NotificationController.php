<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function notification(){
        $notifications = Notification::all();
        return view('pages/supporter/notifications', ['notifications' => $notifications]);

    }
    public function show($id)
    {
        // استرداد الإشعار باستخدام المعرف المرسل عبر الرابط
        $notification = Notification::findOrFail($id);

        // عرض صفحة تفاصيل الإشعار وتمرير الإشعار كمتغير إلى العرض
        return view('pages/supporter/notDetails', ['notification' => $notification]);
    }
}
