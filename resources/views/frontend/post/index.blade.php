@extends('layouts.app')

@section('title', "$category->name")

@section('meta_description', "$category->meta_description")

@section('meta_keyword', "$category->meta_keyword")

@section('content')

<div class="bg-grey2 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4 class="mb-0">{{ $category->name }}</h4>
                </div>

                @forelse ($post as $postitem)
                <div class="card2 card-shadow mt-4">
                    <div class="card-body">
                        <h6 class="float-end" style="font-size: 12px">Publié par <font color="#fffff">{{ $postitem->user->name }}</font></h6>
                        <br>
                         <a href="{{ url('categories/'.$category->slug.'/'.$postitem->slug) }}" class="text-decoration-none">
                            <h4 class="post-heading"> {{ $postitem->name }} </h4>
                        </a>
                        <br>
                        <h6 style="font-size: 12px">Publié le <font color="#ffffff">{{ $postitem->created_at->format('d-m-y') }}</font></h6>
                    </div>
                </div>
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h2>Aucune publication trouvé!</h2>
                    </div>
                </div>
                @endforelse
                <div class="pagination mt-2">
                    {{ $post->links() }}
                </div>

            </div>
                        <div class="col-md-3">
                            <div class="border p-2">
                            <h4><center>Derniers articles</center></h4>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection