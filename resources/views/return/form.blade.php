@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            RETURN EQUIPMENT
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'return.store','method' => 'POST','files' => true]) !!}
            {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('date_return','Date Return') }}
                    {{ Form::date('date_return',null,['class'=>'form-control','id'=>'date_return']) }} 
                </div>
                <div class="col-md-6">
                    {{ Form::label('count','Count') }}
                    {{ Form::text('count', null,['class' => 'form-control','id' => 'count','name' => 'count']) }}
                </div>
                <div class="col-md-6">
                    {{-- Equipment ID --}}
                    {{ Form::hidden('equipment_id', $assign->equipment_id, null,['class' => 'form-control','id'=>$assign->equipment_id,'name' => $assign->equipment_id]) }}
                </div>
                <div class="col-md-6">
                    {{-- Staff ID --}}
                    {{ Form::hidden('staff_id', $assign->staff_id, null,['class' => 'form-control','id'=>$assign->staff_id,'name' => $assign->staff_id]) }}
                </div>
                <div class="col-md-6">
                    {{-- Assign id --}}
                    {{ Form::hidden('assign_id', $assign->id, null,['class' => 'form-control','id'=>$assign->id,'name' => $assign->id]) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('remarks','Remarks') }}
                    {{ Form::text('remarks', null,['class' => 'form-control','id' => 'remarks','name' => 'remarks']) }}
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