@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a><h4>List of Staff</h4><a/>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a href="{{ route('staff.create') }}"  data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="tooltip" data-placement="left" title="Add Staff" >  
                                <i class="fa fa-user-plus fa-2x"></i> Add Staff
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-xl">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Staff Record</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <form method="POST" action="{{ url('/createStaff') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label>Last Name</label>
                                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                            </div>
                                            <div class="col-md-3">
                                                <label>First Name</label>
                                                <input id="firstName" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="firstName" autofocus>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Middle Name</label>
                                                <input id="middleName" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middleName" autofocus>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Suffix Name</label>
                                                <input id="suffixName" type="text" class="form-control" name="suffix_name" value="{{ old('suffix_name') }}" required autocomplete="suffixName" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label>Date of Birth</label>
                                                <input id="birthdate" placeholder="Date of Birth" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobile Number</label>
                                                <input id="mobileNum" type="number" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobileNumber" autofocus>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Designation</label>
                                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>
                                            </div>
                                        </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" type="submit">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                            </div>
                            
                        </div>
                    </div>

                <div class="card shadow border-0" id="example2">
                    <div class="table-responsive">  
                        <table class="table">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Birthdate</th>
                            <th>Mobile Number</th>
                            <th>Email Address</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($staff as $staffs)
                        <tr>
                            <td>{{ $staffs->id }}</td>
                            <td>{{ $staffs->first_name }} {{ $staffs->last_name }}</td>
                            <td>{{ $staffs->designation }}</td>
                            <td>{{ $staffs->birthdate }}</td>
                            <td>{{ $staffs->mobile_number }}</td>
                            <td>{{ $staffs->email }}</td>
                            <td>
                                <a href="{{ url('/edit/'.$staffs->id) }}" class="btn btn-sm btn-warning">Edit</a>
        
                            </td>
        
        
                        </tr>
                    @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection