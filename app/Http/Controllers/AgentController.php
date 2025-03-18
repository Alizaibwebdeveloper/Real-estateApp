<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
