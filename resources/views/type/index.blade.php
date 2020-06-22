@extends('layouts.app')

@section('content')
@isset($message)
    <div class="alert alert-success">
    <strong>{{@message}}</strong>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <a><h4>List of Equipment Type</h4><a/>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a  href="{{ route('type.create') }}" data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="tooltip" title="Add New Equipment Type" >  
                                <i class="fa fa-user-plus fa-2x">
                                    <svg class="bi bi-laptop" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.5 3h-11a.5.5 0 0 0-.5.5V11h12V3.5a.5.5 0 0 0-.5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11z"/>
                                        <path d="M0 12h16v.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5V12z"/>
                                    </svg>
                                </i>
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
                            <th style="text-align:center">Equipment Code</th>
                            <th style="text-align:center">Type of Equipment</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        @foreach($equipType as $type)
                        <tr>
                            <td style="text-align:center">{{ $type->equipment_code }}</td>
                            <td style="text-align:center">{{ $type->equipment_desc }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/editType/'.$type->id) }}" class="btn btn-red" title="Edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                  </svg></a>
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