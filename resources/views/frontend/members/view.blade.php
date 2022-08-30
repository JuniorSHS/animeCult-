@extends('layouts.app')

@section('title', 'Nos membres')

@section('content')


{{-- affichage des membres avec une boucle foreach --}}
    <div class="container"><br><br>
        <div class="row2 justify-content-center align-self-center">
@foreach ($members as $member)
    <div class="Body">
        <div class="lksBOX" style="box-shadow:0 0 2px rgba(0,0,0,0.3);">
            <div class="bandBOX" style="background:rgb(77, 77, 77); text-align: center; padding: 12px 7px;">{{ $member->role }}</div>
            <div class="descBOX">
                <img src="{{ asset('uploads/membres/'.$member->avatar) }}" alt=" ">
                <img src="https://i.pinimg.com/564x/6a/bf/01/6abf0106491a2d0b4a17ec53d438506e.jpg" alt="">
            </div>
            <div class="pseudoBOX" 
            style="background:rgb(159, 159, 159); color:rgb(63, 63, 63); text-shadow:-1px 1px 0 rgba(0,0,0,0.1);">
            <a href="{{ url('membres/'. $member->name) }}" class="text-decoration-none" style="color: rgb(236, 236, 236);">{{ $member->name }}</a>
            </div> 
        </div>
        <br><br>
    </div>
@endforeach
        </div>
        <br>
    </div>
    
@endsection