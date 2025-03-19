<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Mail\RegisteredMail;
use Mail;
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

    if ($request->start_date) {
        $query->whereDate('created_at', '>=', $request->start_date);
    }

    // Check if end date is provided
    if ($request->end_date) {
        $query->whereDate('created_at', '<=', $request->end_date);
    }


    $data['getRecord'] = $query->paginate(100);
$data['TotalAdmin'] = User::where('role','=','admin')->count();
$data['TotalAgent'] = User::where('role','=','agent')->count();
$data['TotalUsers'] = User::where('role','=','user')->count();
$data['TotalActive'] = User::where('status','=','active')->count();
$data['TotalInActive'] = User::where('status','=','inactive')->count();
            $data['TotalUser'] = User::count();

    return view('admin.users_list', $data);
}


        public function admin_users_view($id){
            $data['getRecord'] = User::find($id);
            return view('admin.users.view', $data);
        }

        public function admin_add_users(){
            return view('admin.users.add');
        }

        public function admin_add_users_store(Request $request){
            $request->validate([
                'name' =>'required',
                'username' =>'required|unique:users',
                'email' =>'required|unique:users|email',
                'phone' =>'required|unique:users',
                'password' => 'required|min:8',
                'role' =>'required',
               'status' =>'required',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->status = $request->status;
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new RegisteredMail($user));

            return redirect('admin/users')->with('success', 'Email send to Registered added successfully!');
        }

        public function set_new_password($token){
            $data['token'] = $token;
            return view('auth.reset_pass', $data);
        }

        public function set_new_password_post(Request $request, $token)
{
    $user = User::where('remember_token', $token)->first(); // Fetch the user instance

    if (!$user) {
        return redirect('/admin/login')->with('error', 'Token not found or expired!');
    }

    $request->validate([
        'password' => 'required|min:8',
    ]);

    $user->password = Hash::make($request->password);
    $user->remember_token = Str::random(50);
    $user->save(); // Now it's an instance, so save() works

    return redirect('/admin/login')->with('success', 'Password reset successfully!');
}

    public function admin_users_edit($id){
        $data['getRecord'] = User::find($id);
        return view('admin.users.edit', $data);
    }

    public function admin_users_edit_store(Request $request, $id){
        $request->validate([
            'name' =>'required',
            'username' =>'required|unique:users,username,'.$id,
            'email' =>'required|unique:users,email,'.$id,
            'phone' =>'required|unique:users,phone,'.$id,
            'role' =>'required',
           'status' =>'required',
            'password' => 'nullable|min:8',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/users')->with('success', 'User updated successfully!');
    }

    public function admin_users_delete($id){
        User::find($id)->delete();
        return redirect('admin/users')->with('success', 'User deleted successfully!');
    }

    public function admin_users_update(Request $request){

      $recorder = User::find($request->input('edit_id'));
      $recorder->name = $request->input('edit_name');
      $recorder->save();
      return response()->json(['success'=>'User updated successfully']);

}

public function admin_users_change_status(Request $request){
    $user = User::find($request->id);
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->status = $request->status;
    $user->save();

    return response()->json(['success' => 'Status changed successfully']);
}

public function my_profile(){
    $data['getRecord'] = User::find(Auth::user()->id);
    return view('admin.my_profile', $data);
}



}


