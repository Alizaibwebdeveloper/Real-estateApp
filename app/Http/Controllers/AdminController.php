<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Support\Str;

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

    public function admin_profile(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function admin_profile_update(Request $request){

        $user = user::find(Auth::user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }

if (!empty($request->file('photo'))) {
    $image = $request->file('photo');

    // Generate a random 30-character filename
    $imageName = Str::random(30) . '.' . $image->getClientOriginalExtension();

    // Move the uploaded file to the 'public/upload/' directory
    $image->move(public_path('upload/'), $imageName);

    // Save only the filename in the database
    $user->photo = $imageName;
    $user->save();
}


        $user->address = $request->address;
        $user->about= $request->about;
        $user->website = $request->website;
        $user->save();
        return redirect('admin/profile')->with('success', 'Profile updated successfully!');

        }
    }


