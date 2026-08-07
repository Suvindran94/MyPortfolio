<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MessagesController extends Controller
{
    public function index(){

        $contacts = DB::table('contact')->latest()->paginate(10); 

        return view('Messages.index',compact('contacts'));

    }
}
