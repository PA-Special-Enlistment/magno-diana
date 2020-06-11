@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a class="navbar-brand">Staff</a>
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
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Designation</th>
                            <th style="text-align:center">Birthdate</th>
                            <th style="text-align:center">Mobile Number</th>
                            <th style="text-align:center">Email Address</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        @foreach($staff as $data)
                        <tr>
                            <td style="text-align:center">{{ $data->id }}</td>
                            <td style="text-align:center">{{ $data->first_name }} {{ $data->last_name }}</td>
                            <td style="text-align:center">{{ $data->designation }}</td>
                            <td style="text-align:center">{{ $data->birthdate }}</td>
                            <td style="text-align:center">{{ $data->mobile_number }}</td>
                            <td style="text-align:center">{{ $data->email }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/editStaff/'.$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('/assignStaff/'.$data->id) }}" class="btn btn-sm btn-warning">Assign</a>
                                <a href="{{ url('/returnStaff/'.$data->id) }}" class="btn btn-sm btn-warning">Return</a>
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