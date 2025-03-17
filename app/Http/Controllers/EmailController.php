<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmailModel;
use Mail;
use App\Mail\ComposeEmailMail;

class EmailController extends Controller
{
    public function email_compose()
    {
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.emails.compose', $data);
    }


    public function email_compose_post(Request $request)
{
    // Validate request
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'cc_email' => 'nullable|email',
        'subject' => 'required|string|max:255',
        'description' => 'required|string'
    ]);

    // Save email data
    $save = new ComposeEmailModel;
    $save->user_id = $request->user_id;
    $save->cc_email = $request->cc_email;
    $save->subject = $request->subject;
    $save->description = $request->description;
    $save->save();


    return redirect('admin/email/compose')->with('success', 'Email successfully sent!');
}

public function email_send(){
    $data['getRecord'] = ComposeEmailModel::get();
    return view('admin.emails.send', $data);
}

public function admin_email_send_delete(Request $request) {
    if ($request->has('id')) {
        $ids = explode(',', $request->query('id')); // Use `query()` instead of `input()`

        foreach ($ids as $id) {
            $getRecord = ComposeEmailModel::find($id);
            if ($getRecord) {
                $getRecord->delete();
            }
        }

        return redirect()->back()->with('success', 'Selected emails successfully deleted!');
    } else {
        return redirect()->back()->with('error', 'No emails selected for deletion.');
    }
}

public function admin_email_read($id){
    $data['getRecord'] = ComposeEmailModel::find($id);
   return view('admin.emails.read', $data);
}

public function admin_email_read_delete($id){
    $getRecord = ComposeEmailModel::find($id);
        $getRecord->delete();
        return redirect('admin/email/send')->with('success', ' send Email successfully deleted!');

}

}
