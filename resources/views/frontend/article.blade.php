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
                            <h4>Article Details</h4>
                            <h2>{{ $article->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('uploads/articles_images/' . $article->image) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        @foreach ($article->categories as $category)
                                            <span><a href="{{ Route('categories.show',$category) }}" style="color: unset">{{ $category->name }}</a></span>
                                        @endforeach
                                        <a href="#">
                                            <h4>{{ $article->title }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $article->user->name }}</a></li>
                                            <li><a href="#">{{ $article->created_at }}</a></li>
                                            <li><a href="#">{{ $article->comments->count() }} Comments</a></li>
                                        </ul>
                                        <p>{{ $article->content }}</p>
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
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>{{ $article->comments->count() }} Comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($article->comments as $comment)
                                            <li style="display: block">
                                                <div class="right-content">
                                                    <h4>{{ $comment->user->name }}<span>{{ $comment->updated_at }}</span></h4>
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @auth
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="{{ Route('comments.store') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="content" rows="6" id="content"
                                                            placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit"
                                                            class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endauth
                            
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
