@extends('naster')
@section('content')
 <!-- Featured blog post-->
 <div class="card mb-4">
                    
 <div class="small text-muted">
 
 <h2 class="card-title">{{ $post->title }}</h2>
 Posted on {{ $post->created_at->toDayDateTimeString()  }}
 </div>
                        
               @if ($post->url)
                     <a href="#!"><img  src="../upload/{{ $post->url }}" ></a>
               @endif
                     <div class="card-body">
                           
                            <p class="card-text">{{ $post->body }}</p>
                          <br>
                     
                          <div class="comments">

                        @foreach ($post->comments as $comment)

                            <p class="comment">{{ $comment->body }}</p>

                         @endforeach

                     </div>
                            <br>

            <form method="POST" action="/posts/{{ $post->id }}/store" >
                     {{ csrf_field() }}

                     <div class="form-group">
                          <label for="Body">Write Something . . .</label>
                          <textarea name="body" id="body" class="form-control"></textarea>
                     </div>
                     

                     <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Comment</button>
                     </div>
            </form>
                         
                        </div>
                    </div>
                    
 @stop                  