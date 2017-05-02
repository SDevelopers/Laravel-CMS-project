@extends('layouts.admin')

@section('content')


	<h1>Categories</h1>

	<div class="col-sm-6">

	    {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}
	    
	        <div class='form-group'>
	           <p>{!! Form::label('name', 'Name') !!}</p>
	            {!! Form::text('name', null, ['class'=>'form-control']) !!}
	        </div>
	       
	        <div class = 'form-group'>
	            {!!Form::submit('Add Category', ['class' => 'btn btn-primary'])!!}
	        </div>    
	    
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    
	   	{!! Form::close() !!}

	</div>

	<div class="col-sm-6">

		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Created</th>
					<th>Updated</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)

					<tr>
						<th>{{$category->id}}</th>
						<th><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></th>
						<td>{{$category->created_at->diffForHumans()}}</td>
						<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
					</tr>

				@endforeach
			</tbody>
		</table>

	</div>

@stop

