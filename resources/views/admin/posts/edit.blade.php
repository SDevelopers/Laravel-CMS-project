@extends('layouts.admin')


@section('content')

<h1>Edit Post</h1>

    {!! Form::model($post, ['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
    
        <div class='form-group'>
           <p>{!! Form::label('title', 'Title') !!}</p>
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
           <p>{!! Form::label('category_id', 'Catwgory: ') !!}</p>
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
           <p>{!! Form::label('photo_id', 'Photo: ', ['class'=>'btn btn-default btn-file'] ) !!}</p>
            {!! Form::file('photo_id', null) !!}
        </div>

        <div class='form-group'>
           <p>{!! Form::label('body', 'Description: ') !!}</p>
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
       
        <div class = 'form-group'>
            {!!Form::submit('Update Post', ['class' => 'btn btn-primary', 'rows' => '3'])!!}
        </div>    
    
   	{!! Form::close() !!}

   	@include('includes.form_error')

@stop