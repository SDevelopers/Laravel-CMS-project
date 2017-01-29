@extends('layouts.admin')

@section('content')

<h1>Create Users</h1>

    {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
    
        <div class='form-group'>
           <p>{!! Form::label('title', 'Title') !!}</p>
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
       
        <div class = 'form-group'>
            {!!Form::submit('Create Book', ['class' => 'btn btn-primary'])!!}
        </div>    
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
   	{!! Form::close() !!}

@stop