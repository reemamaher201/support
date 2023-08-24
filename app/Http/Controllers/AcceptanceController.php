<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use Illuminate\Http\Request;

class AcceptanceController extends Controller
{
    public function notDetails()
    {
        $acceptances = Acceptance::all();
        return view('pages/supporter/notDetails', compact('acceptances'));
    }

    public function store(Request $request)
    {
        Acceptance::create($request->all());
        return redirect()->route('acceptances.notDetails');
    }
}
