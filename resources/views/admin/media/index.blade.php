@extends('layouts.admin')

@section('content')


	<h1>Media</h1>

	@if($photos)
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
			@foreach($photos as $photo)

				<tr>
					<th>{{$photo->id}}</th>
					<th><img width="150px;" src="{{$photo->file}}"/></th>
					<td>{{$photo->created_at->diffForHumans()}}</td>
					<td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
					<td>
						
					    {!! Form::open(['id'=>'create-form', 'method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

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
	@endif

@stop

