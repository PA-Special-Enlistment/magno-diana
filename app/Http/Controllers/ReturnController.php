<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Returns;
use App\Assign;
use App\Staff;
use App\Equipment;
use Session;
use DB;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $return = new Returns;

        // $return->count = $request->input('count');
        $return->equipment_id = $request->input('equipment_id');
        $return->staff_id = $request->input('staff_id');
        $return->assign_id = $request->input('assign_id');
        $return->date_return = $request->input('date_return');
        $return->remarks = $request->input('remarks');

        $return->save();
        Session::flash('success','Staff record was Successfully Updated');

        $updateStatus = Equipment::find($request->input('equipment_id'));
        $updateStatus->count = 'Return';

        $updateStatus->update();


        return redirect()->route('equipment.index');
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
        $assign = Assign::where('id', '=', $id)->first();
        // $staff = Staff::select(DB::raw('CONCAT(last_name, ", ", first_name, " ", middle_name) AS full_name'), 'id')->orderBy('last_name')->pluck('full_name', 'id');
        // $equipment = Equipment::orderBy('id')->pluck('name', 'id');

        return view('return.form')->with('assign', $assign);
    }

    public function editReturn($id)
    {
        $staffID = $id;
        $name = Staff::select(DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'id')->where('id', '=', $id)->pluck('full_name')->first();
        $record = Returns::select('code', 'equipment_id', 'return.staff_id', 'return.id', 'return.assign_id', 'type', 'name', 'date_return', 'remarks')->where('return.staff_id', '=', $id)->join('equipment', 'return.equipment_id', '=', 'equipment.id')->join('staff', 'return.staff_id', '=','staff.id')->get();
        // $equipment = Equipment::orderBy('id')->pluck('name', 'id');

        return view('return.index', compact('name'))->with(['record' => $record]);
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
