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
                            <th style="text-align:center">ID/Code</th>
                            <th style="text-align:center">Registration Date</th>
                            <th style="text-align:center">Type of Product</th>
                            <th style="text-align:center">Name of Product</th>
                            <th style="text-align:center">Assignee</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        @foreach($data as $equip)
                        <tr>
                            <td style="text-align:center">{{ $equip->id }}</td>
                            <td style="text-align:center">{{ $equip->registration_date }}</td>
                            <td style="text-align:center">{{ $equip->type }}</td>
                            <td style="text-align:center">{{ $equip->name }}</td>
                            <td style="text-align:center">{{ $equip->count }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/edit/'.$equip->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('/assign/'.$equip->id) }}" class="btn btn-sm btn-warning">Assign</a>
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