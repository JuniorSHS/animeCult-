@extends('layouts.app')

@section('title', "Prochainement")

@section('content')

<div class="container">
    <div class="row2 justify-content-center align-self-center">
@foreach ($animes as $anime)
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url({{ asset('uploads/anime/'.$anime->image) }})"></div>
    </div>
    <div class="description">
      <h1> {{ $anime->name }} </h1>
      <h2> <?php $date = new DateTime($anime->date_release);
        echo $date->format('d/m/Y'); ?> </h2>
      <p> {!! $anime->description !!} </p>
      <p class="read-more">
        <a href="{{ url('prochainement/'. $anime->name) }}">En savoir plus</a>
      </p>
    </div>
  </div>
@endforeach
    </div>

</div>


@endsection