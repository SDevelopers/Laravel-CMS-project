@extends('layouts.admin')

@section('content')

<h1>Create Users</h1> 

    {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
    
        <div class='form-group'>
           <p>{!! Form::label('name', 'Name: ') !!}</p>
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

		<div class='form-group'>
		   <p>{!! Form::label('email', 'Email: ') !!}</p>
		    {!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
		   <p>{!! Form::label('role_id', 'Role: ') !!}</p>
		    {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, 3, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
		   <p>{!! Form::label('is_active', 'Status: ') !!}</p>
		    {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], 0, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
		   <p>{!! Form::label('password', 'Password: ') !!}</p>
		    {!! Form::password('password', ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
		   <p>{!! Form::label('photo_id', 'Photo: ') !!}</p>
		    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>
       
        <div class = 'form-group'>
            {!!Form::submit('Create User', ['class' => 'btn btn-primary'])!!}
        </div>    
    
   	{!! Form::close() !!}

   	@include('includes.form_error')

@stop