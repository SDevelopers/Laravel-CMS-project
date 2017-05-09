@extends('layouts.admin')


@section('content')

@include('includes.tinyeditor')

<h1>Create Page</h1>

    {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'AdminPagesController@store', 'files'=>true]) !!}
    
        <div class="col-lg-8">
        
        <div class='form-group'>
           <p>{!! Form::label('title', 'Title') !!}</p>
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
           <p>{!! Form::label('body', 'Description: ') !!}</p>
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
       
        <div class = 'form-group'>
            {!!Form::submit('Create Page', ['class' => 'btn btn-primary', 'rows' => '3'])!!}
        </div>    

        </div>

        <div class="col-lg-4">

          <div class='form-group'>
             <p>{!! Form::label('is_active', 'Visibility: ') !!}</p>
              {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'], null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
             <p>{!! Form::label('photo_id', 'Photo: ' ) !!}</p>
              {!! Form::file('photo_id', null) !!}
          </div>

        </div>
    
   	{!! Form::close() !!}

   	@include('includes.form_error')

@stop