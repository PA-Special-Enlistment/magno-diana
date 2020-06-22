@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($equipment) ? 'EDIT EQUIPMENT RECORD' : 'CREATE EQUIPMENT RECORD' }}
        </div>
        <div class="card-body">
            @if(isset($equipment))
            {!! Form::model($equipment, ['route' => ['equipment.update', $equipment->id], 'method' => 'PUT', 'files' => true ]) !!}
            @else
            {!! Form::open(['route' => 'equipment.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('code','Code/ID') }}
                    {{ Form::text('code',null,['class'=>'form-control','id'=>'code']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('registration_date','Registration Date') }}
                    {{ Form::date('registration_date',null,['class'=>'form-control','id'=>'registration_date']) }} 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('count','Status') }}
                    {{ Form::select('count',$status, null,['class' => 'form-control','id' => 'count','name' => 'count']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('type','Type of Equipment') }}
                    {{ Form::select('type',$type, null,['class' => 'form-control','id' => 'type','name' => 'type']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('name','Brand') }}
                    {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }} 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('specs','Specification') }}
                    {{ Form::text('specs',null,['class'=>'form-control','id'=>'specs']) }} 
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                {{ Form::button( isset($equipment) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('equipment.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>
@endsection