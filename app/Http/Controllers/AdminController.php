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
        $users = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(id) as total_users')
    ->groupBy('year', 'month')
    ->orderBy('year', 'desc')
    ->orderBy('month', 'desc')
    ->get();

    $data['months']= $users->pluck('month');
    $data['counts'] = $users->pluck('count');
        return view('admin.index', $data);
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

        public function admin_users(Request $request)
{
    $query = User::query();

    if ($request->filled('id')) {
        $query->where('id', $request->id);
    }

    if ($request->filled('name')) {
        $query->where('name', 'like', "%{$request->name}%");
    }

    if ($request->filled('username')) {
        $query->where('username', 'like', "%{$request->username}%");
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', "%{$request->email}%");
    }

    if ($request->filled('phone')) {
        $query->where('phone', 'like', "%{$request->phone}%");
    }

    if ($request->filled('website')) {
        $query->where('website', 'like', "%{$request->website}%");
    }

    if ($request->filled('role')) {
        $query->where('role', $request->role);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $data['getRecord'] = $query->paginate(5);

    return view('admin.users_list', $data);
}


        public function admin_users_view($id){
            $data['getRecord'] = User::find($id);
            return view('admin.users.view', $data);
        }

        public function admin_add_users(){
            return view('admin.users.add');
        }
    }


