
@extends('layouts.app')

@section('content')
{{-- <div class="card shadow rounded">
        <div class="card-header border-primary text-white bg-primary">
                        <a><h4>Update User Record</h4><a/>
                        </div>
                <div class="card-body">
                        <form method="put" action="{{ url('/updateUser') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>User Name</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                                <input id="password" placeholder="********" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Confirm Password</label>
                                <input id="confirmPassword" placeholder="********" type="text" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" value="{{ old('confirmPassword') }}" required autocomplete="password">

                                @error('confirmPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Last Name</label>
                                <input id="lastName" type="text" class="form-control" name="last_name" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>First Name</label>
                                <input id="firstName" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="firstName" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Middle Name</label>
                                <input id="middleName" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middleName" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Suffix Name</label>
                                <input id="suffixName" type="text" class="form-control" name="suffix_name" value="{{ old('suffix_name') }}" required autocomplete="suffixName" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Date of Birth</label>
                                <input id="birthdate" placeholder="Date of Birth" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number</label>
                                <input id="mobileNum" type="number" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobileNumber" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Email</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Is Admin</label>
                                <select class="form-control" id="isAdmin" value="{{ old('isAdmin') }}" name="isAdmin" aria-placeholder="Is Admin">
                                    <option>Y</option>
                                    <option>N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Designation</label>
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>
                            </div>
                        </div>
                            <div class="form-group ">
                                <button class="btn btn-default" type="submit">Save</button>
                                <button type="cancel" class="btn btn-default">Close</button>
                            </div>
                </form>
        </div>
    </div>
</div>
            
</div> --}}
{{-- </div>
</div> --}}
<div class="container">
    <div class="card shadow rounded">
    
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($users) ? 'EDIT USER RECORD' : 'CREATE USER RECORD' }}
        </div>
        <div class="card-body">
            @if(isset($users))
            {!! Form::model($users, ['route' => ['users.update', $users->id], 'method' => 'PUT', 'files' => true ]) !!}
            <input type="hidden" name="is_active" id="is_active" value="{{ $users->is_active == 'Y' ? 'Y' : 'N' }}">
            @else
            {!! Form::open(['route' => 'users.store','method' => 'POST','files' => true]) !!}
            @endif
            {{ csrf_field() }} 
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
            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('last_name','LAST NAME') }}
                    {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('first_name','FIRST NAME') }}
                    {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('middle_name','MIDDLE NAME') }}
                    {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('suffix_name','SUFFIX NAME') }}
                    {{ Form::text('suffix_name',null,['class'=>'form-control','id'=>'suffix_name']) }} 
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('birthdate','BIRTHDATE') }}
                    {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
                </div> 
                <div class="col-md-3">
                    {{ Form::label('email','EMAIL') }}
                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('mobile_number','MOBILE NUMBER') }}
                    {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('isAdmin','IS ADMIN') }}
                    @if(isset($user))
                    {{ Form::select('isAdmin', ['Y' => 'Yes', 'N' => 'No'],null, ['class' => 'form-control','id' => 'isAdmin','name' => 'isAdmin']) }}
                    @else
                    {{ Form::select('isAdmin', ['Y' => 'Yes', 'N' => 'No'],'N', ['class' => 'form-control','id' => 'isAdmin','name' => 'isAdmin']) }}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('designation','Designation') }}
                    {{ Form::text('designation',null,['class'=>'form-control','id'=>'designation']) }} 
                </div>
            </div>
            <div class="card-footer border-primary" style="text-align:center">
                {{ Form::button( isset($users) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('users.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
            </div>    
        </div>
    </div>
</div>

@endsection