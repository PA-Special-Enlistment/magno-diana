@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a><h4>List of Equipments</h4><a/>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a  href="{{ route('equipment.create') }}" data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="tooltip" title="ADD PARTNER" >  
                                <i class="fa fa-user-plus fa-2x"></i> Add Equipment
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
                            <th>ID/Code</th>
                            <th>Registration Date</th>
                            <th>Type of Product</th>
                            <th>Name of Product</th>
                            <th>Count</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($data as $equip)
                        <tr>
                            <td>{{ $equip->id }}</td>
                            <td>{{ $equip->registration_date }}</td>
                            <td>{{ $equip->type }}</td>
                            <td>{{ $equip->name }}</td>
                            <td>{{ $equip->count }}</td>
                            <td>
                                <a href="{{ url('/edit/'.$equip->id) }}" class="btn btn-sm btn-warning">Edit</a>
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