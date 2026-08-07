<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ActivityController extends Controller
{
    public function index(){

        $activities = DB::table('device_infos')->latest()->paginate(10); 

        return view('Activity.index',compact('activities'));

    }
}
