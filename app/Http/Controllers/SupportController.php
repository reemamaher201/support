<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\Notification;
use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupportController extends Controller
{




    public function showFormRequest()
    {
        return view('pages.employees.maintenanceRequest');
    }


    public function showSupportRequests()
    {
        $employeeId = Auth::user()->emp_id;
        $supportRequests = SupportRequest::where('employee_id', $employeeId)->get();
        $totalRequests = count($supportRequests);

        return view('pages.employees.show', ['supportRequests' => $supportRequests, 'totalRequests' => $totalRequests]);
    }



    public function submitSupportRequest(Request $request)
    {
        $validatedData = $request->validate([
            'issue_title' => 'required',
            'issue_description' => 'required',
            'requester_name' => 'required',
            'office_location' => 'required',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $filename = Str::random(20) . '.' . $attachment->getClientOriginalExtension();
                $attachment->storeAs('public/attachments', $filename);
                $attachments[] = $filename;
            }
        }

        $supportRequest = new SupportRequest();
        $supportRequest->employee_id=Auth::user()->emp_id;
        $supportRequest->issue_title = $validatedData['issue_title'];
        $supportRequest->issue_description = $validatedData['issue_description'];
        $supportRequest->requester_name = $validatedData['requester_name'];
        $supportRequest->office_location = $validatedData['office_location'];
        $supportRequest->attachments = json_encode($attachments);
        $supportRequest->save();



        return redirect()->route('requests.blade.php');
    }

    public function edit($id)
    {
        $request = SupportRequest::findOrFail($id);
        return view('pages.employees.editRequest', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $supportRequest = SupportRequest::findOrFail($id);

        $supportRequest->update([
            'issue_title' => $request->input('issue_title'),
            'issue_description' => $request->input('issue_description'),
            'requester_name' => $request->input('requester_name'),
            'office_location' => $request->input('office_location'),
        ]);

        return redirect()->route('requests.blade.php')->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function delete($id)
    {
        $request = SupportRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('requests.blade.php')->with('success', 'تم حذف الطلب بنجاح');
    }


    public function showSupport(){
        $supports = SupportRequest::all();
        return view('pages/supporter/requests', ['supports' => $supports]);

    }
    public function show($id)
    {
        $support = SupportRequest::findOrFail($id);
        $acceptances = Acceptance::all();
        return view('pages/supporter/notDetails', compact('support', 'acceptances'));
    }

    public function showAccepted($id)
    {
        $support = SupportRequest::findOrFail($id);
        $support->status = 1;
        $support->save();

        return view('pages/supporter/acceptedNotifications', ['support' => $support]);
    }
    public function showAcceptedPage()
    {
        $n = SupportRequest::all();
        $acceptedRequests = SupportRequest::where('status', 1)->get();
        return view('pages/supporter/acceptedNotifications',compact('acceptedRequests','n'));
    }

    public function showRejected($id)
    {
        $support = SupportRequest::findOrFail($id);
        $support->status = 2;
        $support->save();

        return view('pages/supporter/rejectedNotifications', ['rejectedRequests' => $support]);
    }
    public function showRejectedPage()
    {
        $rejectedRequests = SupportRequest::where('status', 2)->get();
        return view('pages/supporter/rejectedNotifications', ['rejectedRequests' => $rejectedRequests]);
    }
}
