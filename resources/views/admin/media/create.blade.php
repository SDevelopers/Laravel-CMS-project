@extends('layouts.admin')

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@stop

@section('content')


	<h1>Upload Media</h1>

	    {!! Form::open(['class'=>'dropzone', 'method'=>'POST', 'action'=>'AdminMediaController@store', 'files'=>true]) !!}

	    
	   	{!! Form::close() !!}

@stop


@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@stop

