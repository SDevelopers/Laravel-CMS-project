@extends('layouts.admin')

@section('content')

	@if(count($comments) > 0)

	<h1>Comments</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Status</th>
				<th>Author</th>
				<th>Email</th>
				<th>Body</th>
				<th>Created</th>
				<th>Updated</th>
				<th></th>

			</tr>
		</thead>
		<tbody>
			@foreach($comments as $comment)
				<tr>
					<td>{{$comment->id}}</td>
					<td>{{$comment->is_active}}</td>
					<td>{{$comment->author}}</td>
					<td>{{$comment->email}}</td>
					<td>{{$comment->body}}</td>
					<td>{{$comment->created_at->diffForHumans()}}</td>
					<td>{{$comment->created_at->diffForHumans()}}</td>
					<td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
					<td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>
					<td>
						
					@if($comment->is_active == 1)

					    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
					    
					    	<input type="hidden" name="is_active" value="0"/>

					        <div class = 'form-group'>
					            {!!Form::submit('Approved', ['class' => 'btn btn-success'])!!}
					        </div>    
					    
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    
					   	{!! Form::close() !!}

					@else

					    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
					    
					    	<input type="hidden" name="is_active" value="1"/>
					    	
					        <div class = 'form-group'>
					            {!!Form::submit('Unapproved', ['class' => 'btn btn-danger'])!!}
					        </div>    
					    
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    
					   	{!! Form::close() !!}

					@endif

					</td>
					<td>
						
					    {!! Form::open(['id'=>'create-form', 'method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
					    
					    	<input type="hidden" name="id" value="{{$comment->id}}"/>
					    	
					        <div class = 'form-group'>
					            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
					        </div>    
					    
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    
					   	{!! Form::close() !!}

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	@else

	<h1 class="text-center">No comments found</h1>

	@endif

@stop