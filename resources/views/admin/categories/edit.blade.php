@extends('layouts.admin')

@section('content')


	<h1>Categories</h1>

	<div class="col-sm-6">

	    {!! Form::model($category, ['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id], 'files'=>true]) !!}
	    
	        <div class='form-group'>
	           <p>{!! Form::label('name', 'Name') !!}</p>
	            {!! Form::text('name', null, ['class'=>'form-control']) !!}
	        </div>
	       
	        <div class = 'form-group'>
	            {!!Form::submit('Update Category', ['class' => 'btn btn-primary'])!!}
	        </div>    
	    
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    
	   	{!! Form::close() !!}
	   	
	    {!! Form::open(['id'=>'create-form', 'method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

	        <div class = 'form-group'>
	            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
	        </div>    
	    
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    
	   	{!! Form::close() !!}

	</div>

	<div class="col-sm-6">


	</div>

@stop

