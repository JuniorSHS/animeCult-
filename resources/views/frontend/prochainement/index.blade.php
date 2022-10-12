@extends('layouts.app')

@section('title', "Prochainement")

@section('content')

<div class="container">
    <div class="row2 justify-content-center align-self-center">
@foreach ($animes as $anime)
<div class="cardNs">
<div class="cardN">
  <div class="cardN__image-holder">
    <img class="cardN__image" src="{{ asset('uploads/anime/'.$anime->image) }}" alt="wave" />
  </div>
  <div class="cardN-title">
    <a href="#" class="toggle-info btnn">
      <span class="left"></span>
      <span class="right"></span>
    </a>
    <h2>
      <a href="{{ url('prochainement/'. $anime->name) }}" style="text-decoration: none;" target="_blank">{{ $anime->name }}</a>
        <small><?php $date = new DateTime($anime->date_release);
          echo $date->format('d/m/Y'); ?></small>
    </h2>
  </div>
  <div class="cardN-flap flap1">
    <div class="cardN-description">
      {!! $anime->description !!}
    </div>
    <div class="cardN-flap flap2">
      <div class="cardN-actions">
        <a href="{{ url('prochainement/'. $anime->name) }}" target="_blank" class="butnn">En savoir plus</a>
      </div>
    </div>
  </div>
</div>
</div>

{{-- <div class="blog-card">
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
  </div> --}}

@endforeach
    </div>

</div>


@endsection