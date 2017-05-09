                <!-- Blog Comments -->

@if(Auth::check())

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'PostCommentsController@store', 'files'=>true]) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                        
                        <div class='form-group'>
                           <p>{!! Form::label('body', 'Body') !!}</p>
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        </div>

                        <div class = 'form-group'>
                            {!!Form::submit('Submit comment', ['class' => 'btn btn-primary'])!!}
                        </div>    

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}
                </div>

@endif

                <hr>

                <!-- Posted Comments -->

@if(count($comments) > 0)                
    @foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="64px;" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                        <!-- Nested Comment -->
                    @if(count($comment->replies) > 0)
                          @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img width="64px;" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>

                            </div>
                            @endif
                            @endforeach

                        @else

                                No replies

                        @endif

                                {!! Form::open(['id'=>'create-form', 'method'=>'POST', 'action'=>'CommentRepliesController@createReply', 'files'=>true]) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    
                                    <div class='form-group'>
                                       <p>{!! Form::label('body', 'Body') !!}</p>
                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                    </div>

                                    <div class = 'form-group'>
                                        {!!Form::submit('Reply', ['class' => 'btn btn-primary'])!!}
                                    </div>    

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                {!! Form::close() !!}
                        <!-- End Nested Comment -->
                    </div>
                </div>
    @endforeach

@endif