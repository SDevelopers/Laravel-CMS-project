@extends('layouts.admin')


@section('content')

@if(count($posts) > 0)

<h1>Posts</h1>

<table class="table">
	<thead>
		<tr>
			<th>Action</th>
			<th>#</th>
			<th>Title</th>
			<th>User</th>
			<th>Category</th>
			<th>Photo</th>
			<th>Post link</th>
			<th>Post Comments</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>

			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
			<td>{!!Form::submit('X', ['class' => 'btn btn-danger'])!!}</td>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			{!! Form::close() !!}

			<td>{{$post->id}}</td>
			<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
			<td>{{$post->user->name}}</td>
			<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
			<td><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"/></td>
			<td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
			<td><a href="{{route('admin.comments.show', $post->id)}}">Number of comments {{count($post->comments)}}</a></td>
			<td>{{$post->created_at->diffForHumans()}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>

			<td>			
				@if($post->is_active == 1)

				    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id]]) !!}
				    
				    	<input type="hidden" name="is_active" value="0"/>

				        <div class = 'form-group'>
				            {!!Form::submit('Approved', ['class' => 'btn btn-success'])!!}
				        </div>    
				    
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    
				   	{!! Form::close() !!}

				@else

				    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id]]) !!}
				    
				    	<input type="hidden" name="is_active" value="1"/>
				    	
				        <div class = 'form-group'>
				            {!!Form::submit('Unapproved', ['class' => 'btn btn-danger'])!!}
				        </div>    
				    
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    
				   	{!! Form::close() !!}

				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="row">
	
	<div class="col-sm-6 col-sm-offset-5">
		
	{{$posts->render()}}

	</div>

</div>

@else

<h1 class="text-center">NO POSTS FOUND</h1>
<h3 class="text-center">You can create one from <a href="{{route('admin.posts.create')}}">here</a></h3>

@endif

@stop