<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\Notification;
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
        return redirect()->back();
        // return redirect()->route('acceptances.notDetails');
    }

    public function storeProcedures(Request $request)
    {
        $validatedData = $request->validate([
            'procedures_token' => 'required|string',
            'procedures_status' => 'required|in:غير منجزة,منجزة',// Make sure the values match your radio button values
            'procedures_time' => 'required|timestamp'
        ]);

        // Assuming you have an existing record in the database
        $acceptance = Acceptance::first();

        // Update the values of procedures_token and procedures_status
        $acceptance->update([
            'procedures_token' => $validatedData['procedures_token'],
            'procedures_status' => $validatedData['procedures_status'],
            'procedures_time' => now()
        ]);
        return redirect()->back();
    }

    public function procedures()
    {
        $acceptances = Acceptance::all();
        $n = Notification::all();
        return view('pages/supporter/procedures', compact('acceptances','n'));
    }
}
