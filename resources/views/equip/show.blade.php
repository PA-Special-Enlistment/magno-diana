@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            ASSIGN EQUIPMENT
        </div>
        <div class="card-body">
            @if(isset($assign))
            {!! Form::model($assign, ['route' => ['assign.update', $assign->id], 'method' => 'PUT', 'files' => true ]) !!}
            @else
            {!! Form::open(['route' => 'assign.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('assigned_date','Date Assigned') }}
                    {{ Form::text('assigned_date',null,['class'=>'form-control','id'=>'assigned_date']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('staff_id','Assignee') }}
                    {{ Form::select('first_name', ['class' => 'form-control','id' => 'staff_id','name' => 'staff_id']) }}
                </div>
            <div class="row">
                <div class="col-md-6">
                        {{ Form::label('equipment_id','Equipment') }}
                        {{ Form::select('name', ['class' => 'form-control','id' => 'equipment_id','name' => 'equipment_id']) }}
                    </div>
                <div class="col-md-6">
                    {{ Form::label('count','Count') }}
                    {{ Form::date('count',null,['class'=>'form-control','id'=>'count']) }} 
                </div>
            </div>
            <div class="card-footer border-primary" style="center">
                {{ Form::button(  '<i class="fa fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('equipment.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>
@endsection