@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($designation) ? 'Edit Designation' : 'Create Designation Record' }}
        </div>
        <div class="card-body">
            @if(isset($designation))
            {!! Form::model($designation, ['route' => ['designation.update', $designation->id], 'method' => 'PUT', 'files' => true ]) !!}
            @else
            {!! Form::open(['route' => 'designation.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('code','Designation Code') }}
                    {{ Form::text('code',null,['class'=>'form-control','id'=>'code']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('desc','Designation') }}
                    {{ Form::text('desc',null,['class'=>'form-control','id'=>'desc']) }} 
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                {{ Form::button( isset($designation) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('designation.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>
@endsection