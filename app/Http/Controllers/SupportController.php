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

            // إنشاء إشعار
            $notification = new Notification();
            $notification->employee_id = Auth::user()->emp_id; // تخزين معرف الموظف
            $notification->subject = ' طلب صيانة جديد بعنوان:  '. $supportRequest->issue_title .' من المهندس: '.Auth::user()->emp_name;
            $notification->message = $supportRequest->issue_description ;
            $notification->save();


        return redirect()->route('requests');
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

        return redirect()->route('requests')->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function delete($id)
    {
        $request = SupportRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('requests')->with('success', 'تم حذف الطلب بنجاح');
    }


}
