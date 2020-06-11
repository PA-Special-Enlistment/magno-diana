<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Staff;
use App\Assign;
use DB;
use Session;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');

        $staff = Staff::all();
        $this->staf= array();
        foreach ($staff as $staffs) {
            $this->staf[$staffs->id] = $staffs->first_name;
        }
    }

    public function index()
    {
        $data = User::all();
        return view('users.index',['users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assign = new Assign;

        $assign->count = $request->input('count');
        $assign->equipment_id = $request->input('equipment_id');
        $assign->staff_id = $request->input('staff_id');
        $assign->assign_date = $request->input('assign_date');

        $assign->save();
        Session::flash('success','Staff record was Successfully Updated');

        return redirect()->route('euipment.index');
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
        $assignID = $id;
        // $staff = Staff::lists('id', 'first_name');
        $staff = Staff::select(DB::raw('CONCAT(last_name, ", ", first_name, " ", middle_name) AS full_name'), 'id')->orderBy('last_name')->pluck('full_name', 'id');
        // $equipment = Equipment::orderBy('id')->pluck('name', 'id');

        return view('assign.form', compact(
            'id', 'staff', 'assignID'
          ));
    }

    public function editStaff($id)
    {
        $staffID = $id;
        $name = Staff::select(DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'id')->where('id', '=', $id)->pluck('full_name');
        $record = Assign::select('code', 'equipment_id', 'assign.staff_id', 'assign.id', 'type', 'name', 'assign_date')->where('assign.staff_id', '=', $id)->join('equipment', 'assign.equipment_id', '=', 'equipment.id')->join('staff', 'assign.staff_id', '=','staff.id')->get();
        // $equipment = Equipment::orderBy('id')->pluck('name', 'id');

        return view('assign.index', compact('name'))->with(['record' => $record]);
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
        //
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
