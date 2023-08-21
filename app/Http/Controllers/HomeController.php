<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
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
