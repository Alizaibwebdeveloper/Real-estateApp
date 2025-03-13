<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmailModel;

class EmailController extends Controller
{
    public function email_compose()
    {
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.email.compose', $data);
    }

    public function email_compose_post(Request $request){
        $save = new ComposeEmailModel;
        $save->user_id = $request->user_id;
        $save->cc_email = $request->cc_email;
        $save->subject = $request->subject;
        $save->description = $request->description;
        $save->save();

        return redirect('admin/email/compose')->with('success', 'Email successfully send !!');

    }
}
