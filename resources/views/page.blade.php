@extends('layouts.blog-post')

@section('content')

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$page->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$page->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$page->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$page->photo ? $page->photo->file : $page->placeHolder()}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{!! $page->body !!}</p>

                <hr>
            </div>

@stop