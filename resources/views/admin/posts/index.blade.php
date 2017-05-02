@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>User</th>
			<th>Category</th>
			<th>Photo</th>
			<th>Title</th>
			<th>Body</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
	@if($posts)
		@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
			<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
			<td><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"/></td>
			<td>{{$post->title}}</td>
			<td>{{str_limit($post->body, 20)}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>
		</tr>
		@endforeach
	@endif
	</tbody>
</table>

@stop