<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LibSuffixName;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UsersController extends Controller
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
        return Excel::download(new UsersExport, 'Users.xlsx');
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
        $suffix_name = LibSuffixName::pluck('suffix_desc', 'suffix_code');
        return view('users.form', compact('suffix_name'));//,$partner->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input('username'); 
        $check_user = User::where('username','LIKE',$request->input('username'))
                                  ->get();

        $count = count($check_user);

        if($count >= 1){

          
            Session::flash('repeat','Staff Already Exist');
            return redirect()->route('users.index');

        }else{
        $user = new User;

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->birthdate = $request->input('birthdate');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->designation = $request->input('designation');
        $user->isAdmin = $request->input('isAdmin');

        $user->save();

        Session::flash('success','User record was Successfully Updated');

        return redirect()->route('users.index');
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
        // return $id;
        $user = User::find($id);

        return view('users.form')->with([
            'users' => $user
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
        $users = User::find($id);

        $users->last_name = $request->input('last_name');
        $users->first_name = $request->input('first_name');
        $users->middle_name = $request->input('middle_name');
        $users->suffix_name = $request->input('suffix_name');
        $users->birthdate = $request->input('birthdate');
        $users->mobile_number = $request->input('mobile_number');
        $users->email = $request->input('email');
        $users->username = $request->input('username');
        $users->password = bcrypt($request->input('password'));
        $users->designation = $request->input('designation');
        $users->isAdmin = $request->input('isAdmin');

        $users->save();

        Session::flash('success','User record was Successfully Updated');

        return redirect()->route('users.index');
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
