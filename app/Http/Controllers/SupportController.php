<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function showFormRequest(){
        return view('pages.employees.maintenanceRequest');
    }
    public function showSupportRequests()
    {
        $supportRequests = SupportRequest::all();
        return view('pages.employees.show', ['supportRequests' => $supportRequests]);
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
                $filename = time() . '_' . $attachment->getClientOriginalName();
                $attachment->storeAs('attachments', $filename);
                $attachments[] = $filename;
            }
        }

        $supportRequest = new SupportRequest();
        $supportRequest->issue_title = $validatedData['issue_title'];
        $supportRequest->issue_description = $validatedData['issue_description'];
        $supportRequest->requester_name = $validatedData['requester_name'];
        $supportRequest->office_location = $validatedData['office_location'];
        $supportRequest->attachments = json_encode($attachments);
        $supportRequest->save();

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
