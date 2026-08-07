<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fetchdetails(Request $request)
    {
        $header = DB::table('portfolio_hdr')->where('id',$request->id)->first();
        $details = DB::table('portfolio_dt')->where('portfolio_id',$request->id)->get();

        return response()->json(['header' => $header,'details' =>$details]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postContact(Request $request)
    {
        DB::table('contact')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'ip_address' =>$request->ip(),
            'hostname' => gethostbyaddr($request->ip())
        ]);
        
        return response()->json('Success');
    }

    /**
     * Display the specified resource.
     */
    public function xgetctk()
    {
        $contacts = DB::table('contact')->paginate(10); 
        
        return view('contacts.index', compact('contacts'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
