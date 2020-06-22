<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LibEquipmentType;

class LibEquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LibEquipmentType::all();
        return view('type.index',['equipType' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new LibEquipmentType;

        $type->code = $request->input('equipment_code');
        $type->desc = $request->input('equipment_desc');

        $type->save();

        $message="Registered successfully";

        return redirect()->route('type.index',compact('message'));
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
        $data = LibEquipmentType::find($id);

        return view('type.form')->with([
            'type' => $data
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
        $type = LibEquipmentType::find($id);

        $type->code = $request->input('equipment_code');
        $type->desc = $request->input('equipment_desc');

        $type->save();

        $message="Registered successfully";

        return redirect()->route('type.index',compact('message'));
        return back()->with('success', 'Registered Sucessfulley');
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
