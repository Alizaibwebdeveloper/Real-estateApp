<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComposeEmailModel;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function AgentDashboard(){
        return view('agent.index');
    }

    public function Agentlogin(Request $request){
        return view('agent.agent_login');
    }
    public function AgentLogout(){
        auth()->logout();
        return redirect('agent/login');
    }
    public function agent_email_inbox(){

        $data['getRecord']= ComposeEmailModel::getAgentrecord(Auth::user()->id);
        return view('agent.email.inbox', $data);
    }
}
