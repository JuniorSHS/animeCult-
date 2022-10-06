@extends('layouts.app')

@section('title', "$setting->nom_site")
@section('meta_description', "$setting->meta_description")
@section('meta_keyword', "$setting->meta_keyword")
@section('content')

<div class="bg-grey py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($all_categories as $all_cate_item)
                        <div class="item">
                            <a href="{{ url('categories/'.$all_cate_item->slug) }}" class="text-decoration-none">
                            <div class="card2">
                                <img src="{{ asset('uploads/category/'.$all_cate_item->image) }}" alt="image">
                                <div class="card-body text-center">
                                    <h6 class="text-red">{{ $all_cate_item->name }}</h6>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey2 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Présentation d'Anime Cult'</h4>
                <div class="underline"></div>
                <p class="text-police">Anime-Cult' c'est un site de communauté pour les fans de l'animation japonaise, des mangas, des webtoons.</p>
                <p class="text-police">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, ea reiciendis. Natus quas animi exercitationem minima, 
                    quaerat cupiditate eveniet cumque non repudiandae est amet rem libero repellendus molestias molestiae quo. Natus quas animi exercitationem minima, 
                    quaerat cupiditate eveniet cumque non repudiandae est amet rem libero repellendus molestias molestiae quo.</p>
                <p class="text-police">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, ea reiciendis. Natus quas animi exercitationem minima, 
                    quaerat cupiditate eveniet cumque non repudiandae est amet rem libero repellendus molestias molestiae quo. Natus quas animi exercitationem minima, 
                    quaerat cupiditate eveniet cumque non repudiandae est amet rem libero repellendus molestias molestiae quo.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-grey">
    <div class="container">
        <div class="row2">
            <div class="col-md-12">
                <h4>Publications récentes</h4>
                <div class="underline"></div>
            </div>
                    <div class="owl-carousel category-carousel2 owl-theme">
                        @foreach ($latest_posts as $latest_posts_item)
                             <div class="flip-card-container" style="--hue: 220">
                                 <div class="flip-card">
                                 <div class="card-front">
                                     <figure>
                                     <div class="img-bg"></div>
                                     <img class="imgCard" src="{{ asset('uploads/post/'.$latest_posts_item->image) }}" alt="">
                                     <figcaption>{{ $latest_posts_item->name }}</figcaption>
                                     </figure>
                             
                                     <ul class="tlb">
                                     <li class="ndt li">Detail 1</li>
                                     <li class="ndt li">Detail 2</li>
                                     <li class="ndt li">Detail 3</li>
                                     </ul>
                                 </div>
                             
                                 <div class="card-back">
                                     <figure>
                                     <div class="img-bg"></div>
                                     <img class="imgCard" src="{{ asset('uploads/post/'.$latest_posts_item->image) }}" alt="">
                                     </figure>
                             
                                     <div class="buttonCard"><i class="fa-solid fa-plus-minus"></i></div>
                             
                                     <div class="design-container">
                                     <span class="design design--1"></span>
                                     <span class="design design--2"></span>
                                     <span class="design design--3"></span>
                                     <span class="design design--4"></span>
                                     <span class="design design--5"></span>
                                     <span class="design design--6"></span>
                                     <span class="design design--7"></span>
                                     <span class="design design--8"></span>
                                     </div>
                                 </div>
                                 </div>
                             </div>
                         @endforeach
                    </div>
    </div>
    </div>
</div>




@endsection