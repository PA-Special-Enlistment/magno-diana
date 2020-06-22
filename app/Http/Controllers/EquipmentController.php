<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\LibStatus;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EquipmentExport;
use App\LibEquipmentType;

class EquipmentController extends Controller
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
        return Excel::download(new EquipmentExport, 'Equipment.xlsx');
    }

    public function getStatus(){
        return $status = LibStatus::all();
    }

    public function index()
    {
        $data = Equipment::all();
        return view('equip.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = LibStatus::pluck('desc', 'desc')->all();
        $type = LibEquipmentType::pluck('equipment_desc', 'equipment_desc')->all();
        return view('equip.form', compact('status', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Equipment;

        $user->code = $request->input('code');
        $user->name = $request->input('name');
        $user->type = $request->input('type');
        $user->count = $request->input('count');
        $user->specs = $request->input('specs');
        $user->registration_date = $request->input('registration_date');

        $user->save();

        $message="Registered successfully";

        return redirect()->route('equipment.index',compact('message'));
        return back()->with('success', 'Registered Sucessfulley');
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
        $data = Equipment::find($id);
        $type = LibEquipmentType::pluck('equipment_desc', 'equipment_desc')->all();
        $status = LibStatus::pluck('desc', 'desc')->all();

        return view('equip.form', compact('type', 'status'))->with([
            'data' => $data
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
