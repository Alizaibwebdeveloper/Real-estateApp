<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeekModel;

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
}
