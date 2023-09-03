<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Rates;
use App\Models\SupportRequest;
use App\Models\User;
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

        $users = User::all();
        $employeeId = Auth::user()->emp_id;
        $supportRequests = SupportRequest::where('employee_id', $employeeId)->get();

            return view('index',compact('supportRequests','users'));

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
