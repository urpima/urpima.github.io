@extends('naster')
@section('content')
                     <!-- Featured blog post-->
                     <div class="card mb-4">
                     @foreach ($posts as $post)

                     @if ($post->url)
                     <a href="#!"><img  src="../upload/{{ $post->url }}" ></a>
                     @endif
                        <div class="card-body">
                            <div class="small text-muted">
                            Posted on {{ $post->created_at }}
                            </div>
                            <h2 class="card-title">
                            <a href="/posts/{{ $post->id}}">
                            {{ $post->title }}</h2>
                            </a>
                            <p class="card-text">{{ $post->body }}</p>
                            <a class="btn btn-primary" href="/posts/{{ $post->id}}">Read more →</a>
                        </div>
                    </div>
                    @endforeach
                    <form method="POST" action="/posts/store" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="form-group">
                          <label form="title">Title</label>
                          <input type="text" name="title" id="title" class="form-control">
                     </div>
                     <div class="form-group">
                          <label for="Body">Body</label>
                          <textarea name="body" id="body" class="form-control"></textarea>
                     </div>
                     <div class="form-group">
                          <label for="url">Image</label>
                          <input id="url" type="file" name="url">
                          </div>

                     <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Post</button>
                     </div>
                    </form>
                    <div>
                          @foreach($errors->all() as $error)

                          {{ $error }} <br>

                          @endforeach
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
@stop