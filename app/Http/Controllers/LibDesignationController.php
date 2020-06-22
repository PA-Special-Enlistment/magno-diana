<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LibDesignation;

class LibDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LibDesignation::all();
        return view('designation.index',['designation' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designation.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $designation = new LibDesignation;

        $designation->code = $request->input('code');
        $designation->desc = $request->input('desc');

        $designation->save();

        $message="Registered successfully";

        return redirect()->route('designation.index',compact('message'));
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
        $data = LibDesignation::find($id);

        return view('designation.form')->with([
            'designation' => $data
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
        $designation = LibDesignation::find($id);

        $designation->code = $request->input('code');
        $designation->desc = $request->input('desc');

        $designation->save();

        $message="Registered successfully";

        return redirect()->route('designation.index',compact('message'));
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
