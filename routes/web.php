<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile',[Admincontroller::class,'admin_profile']);
    Route::post('admin_profile/update',[AdminController::class,'admin_profile_update']);
    Route::get('admin/users',[AdminController::class,'admin_users'])->name('admin.users');
    Route::get('admin/users/view/{id}',[AdminController::class,'admin_users_view']);
    Route::get('admin/email/compose',[EmailController::class,'email_compose']);
    Route::post('admin/email/compose_post',[EmailController::class,'email_compose_post']);
    Route::get('admin/email/send',[EmailController::class,'email_send']);
    Route::get('admin/email_sent',[EmailController::class,'admin_email_send_delete']);
});
Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('agent/dashboard',[AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});

Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');

