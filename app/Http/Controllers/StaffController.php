<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = Staff::all();
        return view('staff.index',
        ['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.form');//,$partner->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new Staff;

        $staff->last_name = $request->input('last_name');
        $staff->first_name = $request->input('first_name');
        $staff->middle_name = $request->input('middle_name');
        $staff->suffix_name = $request->input('suffix_name');
        $staff->birthdate = $request->input('birthdate');
        $staff->mobile_number = $request->input('mobile_number');
        $staff->email = $request->input('email');
        $staff->designation = $request->input('designation');

        $staff->save();
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);

        return view('staff.form')->with([
            'staff' => $staff
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);

        $staff->last_name = $request->input('last_name');
        $staff->first_name = $request->input('first_name');
        $staff->middle_name = $request->input('middle_name');
        $staff->suffix_name = $request->input('suffix_name');
        $staff->birthdate = $request->input('birthdate');
        $staff->mobile_number = $request->input('mobile_number');
        $staff->email = $request->input('email');
        $staff->designation = $request->input('designation');

        $staff->save();

        Session::flash('success','User record was Successfully Updated');

        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
