@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header border-primary text-white bg-primary">
                {{ isset($user) ? 'EDIT USER' : 'CREATE USER' }}
            </div>

                <div class="card-body">
                    @if(isset($user))
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    <input type="hidden" name="is_active" id="is_active" value="{{ $user->is_active == 'Y' ? 'Y' : 'N' }}">
                    @else
                    {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}
                    @endif    
                    <div class="row">
                    <div class="col-md-4">
                        {{ Form::label('username','USER NAME') }}
                        {{ Form::text('username',null,['class'=>'form-control','id'=>'username','name'=>'username']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('password','PASSWORD') }}
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('comfirm_password','CONFIRM PASSWORD') }}
                        <input type="password" class="form-control" name="comfirm_password" id="comfirm_password"> 
                    </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
