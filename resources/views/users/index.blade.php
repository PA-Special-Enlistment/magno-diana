@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a class="navbar-brand">USER</a>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="tooltip" data-placement="left" title="ADD PARTNER" >  
                                <i class="fa fa-user-plus fa-2x"></i> Add New User
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card shadow border-0" id="example2">
                    <div class="table-responsive">  
                        <table class="table table-hover">
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
                        @foreach($users as $user)
                        <tr>
                            <td style="text-align:center">{{ $user->id }}</td>
                            <td style="text-align:center">{{ $user->first_name }} {{ $user->middle_name[0] }}. {{ $user->last_name }}</td>
                            <td style="text-align:center">{{ $user->designation }}</td>
                            <td style="text-align:center">{{ $user->birthdate }}</td>
                            <td style="text-align:center">{{ $user->mobile_number }}</td>
                            <td style="text-align:center">{{ $user->email }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/edit/'.$user->id) }}" class="btn btn-red">Edit</a>
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