<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Session;
use App\LibSuffixName;
use App\LibDesignation;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExport;

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

    public function export() 
    {
        return Excel::download(new StaffExport, 'Staff.xlsx');
    }

    public function index()
    {
        $staff = Staff::select('staff.id', 'first_name', 'middle_name', 'last_name', 'designation', 'birthdate', 'mobile_number', 'email')->leftJoin('lib_designation', 'lib_designation.code', '=', 'staff.designation')
                        ->orderBy('id', 'ASC')
                        ->get();
        return view('staff.index',['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suffix_name = LibSuffixName::pluck('suffix_desc', 'suffix_code');
        $designation = LibDesignation::pluck('desc', 'desc');
        return view('staff.form', compact('suffix_name', 'designation'));//,$partner->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_user = Staff::whereRaw('first_name LIKE "'.$request->input("first_name").'" AND last_name LIKE "'.$request->input("last_name").'" AND middle_name LIKE "'.$request->input("middle_name").'" AND birthdate LIKE "'.$request->input("birthdate").'"')
                                  ->get();

        $count = count($check_user);

        if($count >= 1){

          

          return view('staff.form');//,$partner->id);

        }else{
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
        $suffix_name = LibSuffixName::pluck('suffix_desc', 'suffix_code');
        $designation = LibDesignation::pluck('desc', 'desc');
        $staff = Staff::find($id);

        return view('staff.form', compact('suffix_name', 'designation'))->with([
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

        Session::flash('success','Staff record was Successfully Updated');

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
