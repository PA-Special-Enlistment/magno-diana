@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($staff) ? 'EDIT STAFF RECORD' : 'CREATE STAFF RECORD' }}
        </div>
        <div class="card-body">
            @if(isset($staff))
            {!! Form::model($staff, ['route' => ['staff.update', $staff->id], 'method' => 'PUT', 'files' => true ]) !!}
            @else
            {!! Form::open(['route' => 'staff.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('last_name','Last Name') }}
                    {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('first_name','First Name') }}
                    {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('middle_name','Middle Name') }}
                    {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('suffix_name','Suffix Name') }}
                    {{ Form::select('suffix_name',$suffix_name, isset($staff) ? null : 'NOTAP',['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('birthdate','Birthdate') }}
                    {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
                </div> 
                <div class="col-md-4">
                    {{ Form::label('email','Email') }}
                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                </div>
                <div class="col-md-4">
                    {{ Form::label('mobile_number','Mobile Number') }}
                    {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number']) }} 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('designation','Designation') }}
                    {{ Form::select('designation',$designation, isset($staff) ? null : '01',['class' => 'form-control','id' => 'designation','name' => 'designation']) }}
                </div>
            </div>
            <div class="card-footer border-primary" style="text-align:center">
                {{ Form::button( isset($staff) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('staff.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>
@endsection