@extends('layouts.admin')

@section('content')

	@if(count($replies) > 0)

	<h1>Replies</h1>

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
			@foreach($replies as $reply)
				<tr>
					<td>{{$reply->id}}</td>
					<td>{{$reply->is_active}}</td>
					<td>{{$reply->author}}</td>
					<td>{{$reply->email}}</td>
					<td>{{$reply->body}}</td>
					<td>{{$reply->created_at->diffForHumans()}}</td>
					<td>{{$reply->created_at->diffForHumans()}}</td>
					<td><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>
					<td>
						
					@if($reply->is_active == 1)

					    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
					    
					    	<input type="hidden" name="is_active" value="0"/>

					        <div class = 'form-group'>
					            {!!Form::submit('Approved', ['class' => 'btn btn-success'])!!}
					        </div>    
					    
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    
					   	{!! Form::close() !!}

					@else

					    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
					    
					    	<input type="hidden" name="is_active" value="1"/>
					    	
					        <div class = 'form-group'>
					            {!!Form::submit('Unapproved', ['class' => 'btn btn-danger'])!!}
					        </div>    
					    
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    
					   	{!! Form::close() !!}

					@endif

					</td>
					<td>
						
					    {!! Form::open(['id'=>'create-form', 'method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
					    
					    	<input type="hidden" name="id" value="{{$reply->id}}"/>
					    	
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

	<h1 class="text-center">No replies found</h1>

	@endif

@stop