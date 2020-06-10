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
                                <a  data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="modal" title="ADD PARTNER" >  
                                <i class="fa fa-user-plus fa-2x"></i> Add Equipment
                                    </a>
                            </li>
                        </ul>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Equipment Record</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('/createEquipment') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>Registration Date</label>
                                                    <input id="regDate" type="date" class="form-control" name="registration_date" value="{{ old('registration_date') }}" required autocomplete="regDate" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>Code/Number</label>
                                                    <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                </div>
                                            </div>
                                        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </form>
                        </div>
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
                            <th>ID/Code</th>
                            <th>Registration Date</th>
                            <th>Name of Product</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($data as $equip)
                        <tr>
                            <td>{{ $equip->id }}</td>
                            <td>{{ $equip->registration_date }}</td>
                            <td>{{ $equip->name }}</td>
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