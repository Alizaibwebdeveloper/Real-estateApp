<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeekModel;
use App\Models\WeekTimeModel;
use App\Models\UserTimeModel;
use Auth;

class UserTimeController extends Controller
{
    public function admin_week(){
        $weeks = WeekModel::all();
        return view('admin.week.list', compact('weeks'));
    }

    public function admin_week_add(){
        return view('admin.week.add');
    }

    public function admin_week_add_store(Request $request){
        $week = new WeekModel();
        $week->name = $request->name;
        $week->save();

        return redirect('/admin/week')->with('success', 'Week added successfully');

    }

    public function admin_week_edit($id){
        $week = WeekModel::find($id);
        return view('admin.week.edit', compact('week'));
    }

    public function admin_week_edit_store(Request $request, $id){
        $week = WeekModel::find($id);
        $week->name = $request->name;
        $week->save();
        return redirect('/admin/week')->with('success', 'Week updated successfully');
}

    public function admin_week_delete($id){
        WeekModel::destroy($id);
        return redirect('/admin/week')->with('success', 'Week deleted successfully');
    }

    // week_time start

    public function week_time_list(){
        $weekTimes = WeekTimeModel::all();
        return view('admin.week_time.list',compact('weekTimes'));
    }


    public function week_time_add(){
        return view('admin.week_time.add');
    }

    public function week_time_add_store(Request $request){
        $weekTime = new WeekTimeModel();
        $weekTime->name = $request->name;
        $weekTime->save();

        return redirect('/admin/week_time')->with('success', 'Week Time added successfully');
    }

    public function week_time_edit($id){
        $weekTime = WeekTimeModel::find($id);
        return view('admin.week_time.edit', compact('weekTime'));
    }

    public function week_time_edit_store(Request $request, $id){
        $weekTime = WeekTimeModel::find($id);
        $weekTime->name = $request->name;
        $weekTime->save();
        return redirect('/admin/week_time')->with('success', 'Week Time updated successfully');
    }

    public function week_time_delete($id){
        WeekTimeModel::destroy($id);
        return redirect('/admin/week_time')->with('success', 'Week Time deleted successfully');
    }

    // week_time End

    public function admin_schedule(){
        $weeks = WeekModel::all();
        $weekTimes = WeekTimeModel::all();
        $userRecord = UserTimeModel::get();
        return view('admin.schedule.list', compact('weeks', 'weekTimes','userRecord'));
    }

    public function admin_schedule_add(Request $request){
        UserTimeModel::where('user_id', '=', Auth::user()->id)->delete();
        // dd(Auth::user()->id);
        if(!empty($request->week)){
            foreach($request->week as $value){

                if(!empty($value['status'])){
                    $userTime = new UserTimeModel();
                    $userTime->week_id = $value['week_id'];
                    $userTime->user_id = Auth::user()->id;
                    $userTime->status = 1;
                    $userTime->start_time = $value['start_time'];
                    $userTime->end_time = $value['end_time'];
                    $userTime->save();

                }

            }
        }
        return redirect('/admin/schedule')->with('success', 'Schedule updated successfully');
    }

}
