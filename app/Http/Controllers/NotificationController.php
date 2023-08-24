<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
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

        return view('pages/supporter/acceptedNotifications', ['Notifications' => $notification]);
    }
    public function showAcceptedPage()
    {
        $n = Notification::all();
        $acceptedNotifications = Notification::where('status', 'accepted')->get();
        return view('pages/supporter/acceptedNotifications',compact('acceptedNotifications','n'));
    }

    public function notification(){
        $notifications = Notification::all();
        return view('pages/supporter/notifications', ['notifications' => $notifications]);

    }
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        $acceptances = Acceptance::all();
        return view('pages/supporter/notDetails', compact('notification', 'acceptances'));
    }
}
