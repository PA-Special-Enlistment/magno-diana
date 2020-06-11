@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            ASSIGN EQUIPMENT
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'assign.store','method' => 'POST','files' => true]) !!}
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('assign_date','Date Assigned') }}
                    {{ Form::date('assign_date',null,['class'=>'form-control','id'=>'assign_date']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('count','Count') }}
                    {{ Form::text('count', null,['class' => 'form-control','id' => 'count','name' => 'count']) }}
                </div>
                <div class="col-md-6">
                    {{-- {{ Form::label('equipment_id','Equipment') }}   --}}
                    {{ Form::hidden('equipment_id', $assignID, null,['class' => 'form-control','id'=>$assignID,'name' => $assignID]) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('staff_id','Assignee') }}
                    {{ Form::select('staff_id',$staff, null,['class' => 'form-control','id' => 'staff_id','name' => 'staff_id']) }}
                </div>
            </div>
            <div class="card-footer border-primary" style="text-align:center">
                    {{ Form::button('<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    <a href="{{ route('equipment.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                        <i class="fa fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>   
        </div>
    </div>
</div>
@endsection