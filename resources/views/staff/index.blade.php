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
                        @foreach($staff as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                            <td>{{ $data->designation }}</td>
                            <td>{{ $data->birthdate }}</td>
                            <td>{{ $data->mobile_number }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="{{ url('/editStaff/'.$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
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