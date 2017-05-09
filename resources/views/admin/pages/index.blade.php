@extends('layouts.admin')


@section('content')

@if(count($pages) > 0)

<h1>Posts</h1>

<table class="table">
	<thead>
		<tr>
			<th>Action</th>
			<th>#</th>
			<th>Title</th>
			<th>User</th>
			<th>Photo</th>
			<th>Post link</th>
			<th>Post Comments</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pages as $page)
		<tr>

			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPagesController@destroy', $page->id]]) !!}
			<td>{!!Form::submit('X', ['class' => 'btn btn-danger'])!!}</td>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			{!! Form::close() !!}

			<td>{{$page->id}}</td>
			<td><a href="{{route('admin.pages.edit', $page->id)}}">{{$page->title}}</a></td>
			<td>{{$page->user->name}}</td>
			<td><img height="50px" src="{{$page->photo ? $page->photo->file : 'http://placehold.it/400x400'}}"/></td>
			<td><a href="{{route('home.page', $page->id)}}">View Page</a></td>
			<td>{{$page->created_at->diffForHumans()}}</td>
			<td>{{$page->created_at->diffForHumans()}}</td>

			<td>			
				@if($page->is_active == 1)

				    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPagesController@update', $page->id]]) !!}
				    
				    	<input type="hidden" name="is_active" value="0"/>

				        <div class = 'form-group'>
				            {!!Form::submit('Approved', ['class' => 'btn btn-success'])!!}
				        </div>    
				    
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    
				   	{!! Form::close() !!}

				@else

				    {!! Form::open(['id'=>'create-form', 'method'=>'PATCH', 'action'=>['AdminPagesController@update', $page->id]]) !!}
				    
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
		
	{{$pages->render()}}

	</div>

</div>

@else

<h1 class="text-center">NO PAGES FOUND</h1>
<h3 class="text-center">You can create one from <a href="{{route('admin.pages.create')}}">here</a></h3>

@endif

@stop