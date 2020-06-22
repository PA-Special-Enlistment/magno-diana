@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($type) ? 'Edit Equipment Type' : 'Create Equipment Type Record' }}
        </div>
        <div class="card-body">
            @if(isset($type))
            {!! Form::model($type, ['route' => ['type.update', $type->id], 'method' => 'PUT', 'files' => true ]) !!}
            @else
            {!! Form::open(['route' => 'type.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('equipment_code','Equipment Type Code') }}
                    {{ Form::text('equipment_code',null,['class'=>'form-control','id'=>'equipment_code']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('equipment_desc','Equipment Type') }}
                    {{ Form::text('equipment_desc',null,['class'=>'form-control','id'=>'equipment_desc']) }} 
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                {{ Form::button( isset($type) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('type.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>
@endsection