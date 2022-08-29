@extends('layouts.app')

@section('title', "$post->name")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')

<div class="bg-grey2 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4 class="mb-0">{{ $post->name }}</h4>
                </div>

                    <div class="mt-3">
                        <h6>{{ $post->category->name .' / ' . $post->name }}</h6>
                    </div>

                <div class="card2 card-shadow mt-4">
                    <div class="card-body post-description">
                        {!! $post->description !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card2 mt-3">
                    <div class="card-header">
                        <h6><center>Derniers articles de cette catégorie</center></h6>
                    </div>
                        <div class="card-body">
                            @foreach ($last_posts as $last_post_item)
                            <a href="{{ url('categories/'.$last_post_item->category->slug.'/'.$last_post_item->slug) }}" class="text-decoration-none">
                                <h6>- {{ $last_post_item->name }}</h6>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection