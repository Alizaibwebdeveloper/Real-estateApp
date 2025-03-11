<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request){
        return view('admin.index');
    }

    public function AdminLogout(){

        auth()->guard('web')->logout();
        return redirect('/login');
    }

    public function AdminLogin(Request $request){
        return view('admin.admin_login');
    }
}
