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
                        <a><h4>List of Designation</h4><a/>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a  href="{{ route('designation.create') }}" data-target="#myModal" role="button" class="btn btn-link text-default text-black" data-toggle="tooltip" title="Add New Designation" >  
                                <i class="fa fa-user-plus fa-2x">
                                    <svg class="bi bi-person-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
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
                            <th style="text-align:center">Designation Code</th>
                            <th style="text-align:center">Designation</th>
                            <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        @foreach($designation as $desig)
                        <tr>
                            <td style="text-align:center">{{ $desig->code }}</td>
                            <td style="text-align:center">{{ $desig->desc }}</td>
                            <td style="text-align:center">
                                <a href="{{ url('/editDesig/'.$desig->id) }}" class="btn btn-red" title="Edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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