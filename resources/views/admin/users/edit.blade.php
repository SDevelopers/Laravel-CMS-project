@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1> 

	<div class="row">

		<div class="col-sm-3">
			
			<img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" class="img img-responsive img-rounded"></img>

		</div>


		<div class="col-sm-9">

		    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
		    
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
				    {!! Form::select('role_id', $roles, 3, ['class'=>'form-control']) !!}
				</div>

				<div class='form-group'>
				   <p>{!! Form::label('is_active', 'Status: ') !!}</p>
				    {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
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

	   	</div>
	   	
   	</div>

   	<div class="row">
   		@include('includes.form_error')
   	</div>

   	

@stop