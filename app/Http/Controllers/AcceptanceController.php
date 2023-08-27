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

    public function procedures($id)
    {
        $acceptances = Acceptance::find($id);
        return view('pages/supporter/procedures', compact('acceptances')); // حيث 'procedures.show' هو اسم العرض الذي سيتم استخدامه
    }

    public function storeProcedures(Request $request,$id)
    {
        $acceptance = Acceptance::findOrFail($id);

        $acceptance->update([
            'procedures_token' => $request->input('procedures_token'),
            'procedures_status' => $request->input('procedures_status'),

        ]);

        return redirect()->back()->with('success', 'تم تحديث الإجراء بنجاح');
    }


}
