<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->parent_unit == 1){
            // استرداد جميع الإشعارات
            $notifications = Notification::all();

            // تمرير الإشعارات إلى العرض
            return view('index', ['notifications' => $notifications]);
        }
        else{
            return view('index');
        }
    }



    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'image' => 'required|image',
        ];
        $messages = [
            'name.required' => 'حقل الاسم مطلوب.',
            'image.required' => 'حقل الصورة مطلوب.',
        ];
        $this->validate($request, $rules, $messages);
    }
}
