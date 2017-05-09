@extends('layouts.admin')


@section('content')

@include('includes.tinyeditor')

<h1>Edit Post

        <a class="btn btn-info" href="{{route('home.post', $post->id)}}">View Post</a>

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
        
            <div class = 'form-group'>
                {!!Form::submit('Delete Post', ['class' => 'btn btn-danger'])!!}
            </div>    
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        {!! Form::close() !!} 
</h1>

    {!! Form::model($post, ['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
    
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
            {!!Form::submit('Update Post', ['class' => 'btn btn-primary', 'rows' => '3'])!!}
        </div>  

        </div>

        <div class="col-lg-4">

          <div class='form-group'>
             <p>{!! Form::label('is_active', 'Visibility: ') !!}</p>
              {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'], null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
             <p>{!! Form::label('category_id', 'Category: ') !!}</p>
              {!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class'=>'form-control']) !!}
          </div>

          <img height="200px" src="{{$post->photo ? $post->photo->file : $post->placeHolder()}}">

          <div class='form-group'>
             <p>{!! Form::label('photo_id', 'Photo: ' ) !!}</p>
              {!! Form::file('photo_id', null) !!}
          </div>

        </div>   
    
   	{!! Form::close() !!}

   	@include('includes.form_error')

@stop