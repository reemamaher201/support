<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showRejected($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->status = 'rejected';
        $notification->save();

        return view('pages/supporter/rejectedNotifications', ['rejectedNotifications' => $notification]);
    }
    public function showRejectedPage()
    {
        $rejectedNotifications = Notification::where('status', 'rejected')->get();
        return view('pages/supporter/rejectedNotifications', ['rejectedNotifications' => $rejectedNotifications]);
    }

    public function showAccepted($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->status = 'accepted';
        $notification->save();

        return view('pages/supporter/acceptedNotifications', ['acceptedNotifications' => $notification]);
    }
    public function showAcceptedPage()
    {
        $acceptedNotifications = Notification::where('status', 'accepted')->get();
        return view('pages/supporter/acceptedNotifications', ['acceptedNotifications' => $acceptedNotifications]);
    }

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
