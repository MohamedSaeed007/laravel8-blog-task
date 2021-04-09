@extends('layouts.frontend')

@section('content')
<!-- Page Content -->
     <!-- Banner Starts Here -->
     <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4>Articles</h4>
                  <h2>Our Recent Blog Articles</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      <!-- Banner Ends Here -->
  
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach ($articles as $article)
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ asset('uploads/articles_images/' . $article->image) }}"  alt="">
                                        </div>
                                        <div class="down-content">
                                            @foreach ($article->categories as $category)
                                                <span><a href="{{ Route('categories.show',$category) }}" style="color: unset">{{ $category->name }}</a></span>
                                            @endforeach

                                            <a href="{{ Route('articles.show',$article->id) }}">
                                                <h4>{{ $article->title }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">{{ $article->user->name }}</a></li>
                                                <li><a href="#">{{ $article->created_at }}</a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p>{{ $article->description }}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            @foreach ($article->tags as $tag)
                                                                
                                                                <li><a href="{{ Route('tags.show',$tag) }}">{{ $tag->name }}</a></li>
                                                            @endforeach
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="col-lg-12">
                                {{$articles->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('layouts.partials._sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
